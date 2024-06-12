<?php
namespace Modules\Product\Src\Http\Controller\Clients;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Modules\Product\Src\Models\Product;
use Modules\Product\Src\Http\Requests\ProductRequest;
use Modules\Product\Src\Repositories\ProductRepositoryInterface;
use Modules\Category\Src\Repositories\CategoryRepositoryInterface;
use Modules\Evaluation\Src\Repositories\EvaluationRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $evaluationRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        EvaluationRepositoryInterface $evaluationRepository,
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->evaluationRepository = $evaluationRepository;

    }

    public function index()
    {
        $products = $this->productRepository->getProducts(9, []);
        $categories = $this->categoryRepository->getAllCategories()->get();

        // dd($products);
        return view("product::clients.index", compact("products", "categories"));
    }
    // api shop 
    public function listProductsPage(Request $request)
    {
        $data = $request->json()->all();
        if (isset($data['selectedCategory']) && !in_array($data['selectedCategory'], [1, 2, 3, 4, 5, 999])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid category ID',
                'data' => []
            ], 400);
        }
        if (isset($data['selectFilter']) && !in_array($data['selectFilter'], [0,1, 2, 3, 4])) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Filter ID',
                'data' => []
            ], 400);
        }
        // Content Search
        $priceInput1 = $data['priceInput1'] ?? 0;
        $priceInput2 = $data['priceInput2'] ?? 0;
        if ($data['priceInput1'] > $data['priceInput2']) {
            $priceInput1 = $data['priceInput2'];
            $priceInput2 = $data['priceInput1'];
        }
        $keySelectedCategory = ($data['selectedCategory'] !== '999') ?
            " category : " . $this->nameCategory($data['selectedCategory']) . " ," : '';
        $keyPriceInput1 = ($priceInput1 !== '0' && $priceInput2 !== '0') ?
            " Lowest price : $" . $priceInput1 . " ," : '';
        $keyPriceInput2 = ($priceInput1 !== '0' && $priceInput2 !== '0') ?
            " Highest price : $" . $priceInput2 . " ," : '';
        $keySelectFilter = ($data['selectFilter'] !== '0') ?
            " filter : " . $this->nameSelectFilter($data['selectFilter']) . " ," : '';
        $keyKeywordInputs = (!empty($data['keywordInputs'])) ?
            " keywords : " . $data['keywordInputs'] : '';
        if ($keySelectedCategory !== '' || $keyPriceInput1 !== '' || $keyPriceInput2 !== '' || $keySelectFilter !== '' || $keyKeywordInputs !== '') {
            $count = ' results : ' .$this->productRepository->countProducts($data);
        }else {
            $count = '';
        }
        // END Content Search
        $products = $this->productRepository->getProducts(9, $data);
        return response()->json([
            'products' => $products->items(),
            'links' => $products->links('vendor.pagination.default')->toHtml(),
            'search' => rtrim($keySelectedCategory . $keyPriceInput1 . $keyPriceInput2 . $keySelectFilter . $keyKeywordInputs . $count, ','),
        ]);
    }
    public function detail($id, Request $request)
    {
        $categories = $this->categoryRepository->getAllCategories()->get();
        $product = $this->productRepository->find($id);
        $relatedProduct = $this->productRepository->getProduct($product->category_id, 4);
        if (!$product) {
            return abort(404);
        }
        $breadCrumb = 'Product Details';
        $pageBreadCrumb = $product->name;
        $currentUrl = $request->url();
        return view('product::clients.detail', compact('product', 'categories', 'relatedProduct', 'breadCrumb', 'pageBreadCrumb', 'currentUrl'));
    }

    public function comment($id, Request $request)
    {
        $comment = $request->except(['_token']);
        $comment['product_id'] = $id;
        // dd($comment);
        $this->evaluationRepository->create($comment);

    }
    public function listCart(Request $request)
    {
        $data = $request->json()->all();
        $dataArr = [];
        $newListCard = [];
        $totalPrice = 0;
        foreach ($data as $item) {
            $product = $this->productRepository->find($item['id']);

            if ($product && $item['id'] == $product['id']) {
                $totalItemPrice = $item['quantity'] * $product['price'];
                $dataArr[$product['id']] = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'quantity' => $item['quantity'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'total_price' => $totalItemPrice,
                ];
                $newListCard[$product['id']] = [
                    'id' => $product['id'],
                    'quantity' => $item['quantity'],
                ];
                $totalPrice += $totalItemPrice;
            }
        }
        return response()->json([
            'status' => $dataArr ? 'success' : 'error',
            'message' => $dataArr ? 'Get cart list successfully' : 'The shopping cart is empty',
            'data' => $dataArr ? ['listCart' => $dataArr, 'newListCard' => $newListCard, 'totalPrice' => $totalPrice] : []
        ]);
    }

    public function findName(Request $request)
    {
        $data = $request->json()->all();
        $product = $this->productRepository->find($data['id']);
        return response()->json([
            'status' => $product ? 'success' : 'error',
            'message' => $product ? 'Get product name successfully' : 'Product name does not exist',
            'data' => $product ? $product['name'] : []
        ]);
    }

    public function listProducts(Request $request)
    {
        $data = $request->all();
        $validCategoryIds = [1, 2, 3, 4, 999];
        if (!isset($data['categoryId']) || !in_array($data['categoryId'], $validCategoryIds)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid category ID',
                'data' => []
            ], 400);
        }
        $product = $this->productRepository->getProduct($data['categoryId'], 4);
        return response()->json([
            'status' => $product ? 'success' : 'error',
            'message' => $product ? 'Get the product list successfully' : 'Get the list of failed products',
            'data' => $product ?: []
        ]);
    }

    private function nameCategory($id)
    {
        $category = $this->categoryRepository->find($id);
        return $category ? $category->name : "Unknown Category";
    }
    private function nameSelectFilter($id)
    {
        $filters = [
            '1' => 'Oldest Products',
            '2' => 'Latest Products',
            '3' => 'Highest Price Products',
            '4' => 'Lowest Price Products',
        ];
        return isset($filters[$id]) ? $filters[$id] : "Unknown Filter";
    }

}