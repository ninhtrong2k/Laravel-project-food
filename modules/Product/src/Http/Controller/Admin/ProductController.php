<?php
namespace Modules\Product\Src\Http\Controller\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
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
        $pageTitle = "List Product";
        $pageHeading = "List Product";
        return view("product::admin.index",compact("pageTitle", "pageHeading"));
    }

    public function data()
    {
        $products = $this->productRepository->getAllProduct();
        return DataTables::of($products)
            ->addColumn('edit', function ($product) {
                return '<a href="' . route('admin.products.edit', $product) . '" class="btn btn-warning">Edit</a>';
            })
            ->addColumn('delete', function ($product) {
                return '<a href="' . route('admin.products.delete', $product) . '" class="btn btn-danger delete-action">Delete</a>';
            })
            ->editColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at);
            })
            // ->editColumn('status', function ($product) {
            //     return $product->status == 1 ? '<button class="btn btn-success">Ra Mắt</button>' : '<button class="btn btn-danger">Chưa Ra Mắt</button>';
            // })
            ->editColumn('image', function ($product) {
                return $product->image ? '<img src="'.$product->image.'" style="width:80px;" />' : '';
            })
            ->rawColumns(['image','created_at','edit','delete'])
            ->toJson();
    }
    public function create()
    {
        $pageTitle = "Create Product";
        $pageHeading = "Create Product";
        return view("product::admin.create",compact("pageTitle", "pageHeading"));

    }
    public function store(ProductRequest $request) {
        $product = $request->except(['_token']);
        $product = $this->productRepository->create($product);
        return redirect()->route('admin.products.index')->with('msg', __('product::messages.create.success'));
    }

    public function edit($id) {
        $product = $this->productRepository->find($id);
        if(!$product) {
            abort(404);
        }
        $pageTitle = "Edit Product";
        $pageHeading = "Edit Product";
        $product = $this->productRepository->find($id);
        return view("product::admin.edit",compact("pageTitle", "pageHeading", "product"));
    }
    public function update($id , Request $request) {
        $product = $this->productRepository->find($id);
        if(!$product) {
            abort(404);
        }
        $this->productRepository->update($product->id, $request->except(['_token']));
        return back()->with('msg', __('product::messages.update.success'));
    }
    public function delete($id) {
        $product = $this->productRepository->find($id);
        if(!$product) {
            abort(404);
        }
        $this->productRepository->delete($product->id);
        return back()->with('msg', __('product::messages.delete.success'));
    }

}