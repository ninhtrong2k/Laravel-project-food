<?php
namespace Modules\Product\Src\Http\Controller\Admin;

use App\Http\Controllers\Controller;
use Modules\Product\Src\Http\Requests\ProductRequest;
use Modules\Product\Src\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return "index";
    }
    public function create()
    {
        $pageTitle = "Create Product";
        $pageHeading = "Create Product";
        return view("product::admin.create",compact("pageTitle", "pageHeading"));

    }
    public function store(ProductRequest $request) {
        $product = $request->except(['_token']);
        $product['image'] = $request->input('image_id');
        $product = $this->productRepository->create($product);
        return redirect()->route('admin.products.create')->with('msg', __('product::messages.create.success'));
    }

}