<?php
namespace Modules\Product\Src\Http\Controller\Clients;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
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
        CategoryRepositoryInterface $categoryRepository , 
        EvaluationRepositoryInterface $evaluationRepository ,
        )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->evaluationRepository = $evaluationRepository;

    }
    public function index()
    {
        $pageTitle = "List Product";
        $pageHeading = "List Product";
        return view("product::admin.index",compact("pageTitle", "pageHeading"));
    }
    public function detail($id){
        $categories = $this->categoryRepository->getAllCategories()->get();
        $product = $this->productRepository->find($id);
        $relatedProduct = $this->productRepository->getProduct($product->category_id,4);
        if(!$product){
            return abort(404);
        }
        return view('product::clients.detail',compact('product','categories','relatedProduct'));
    }

    public function comment($id,Request $request){
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
                    'total_price' => $totalItemPrice,
                ];
                $newListCard [$product['id']] = [
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
        $product = $this->productRepository->getProduct($data['categoryId'],4);
        return response()->json([
            'status' => $product ? 'success' : 'error',
            'message' => $product ? 'Get the product list successfully' : 'Get the list of failed products',
            'data' => $product ? : []
        ]);
    }
    
    

    
}