<?php
namespace Modules\Category\Src\Http\Controller;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Modules\Category\Src\Http\Requests\CategoryRequest;
use Modules\Category\Src\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $pageTitle = "List Categories";
        $pageHeading = "List Categories";
        return view("category::index", compact("pageTitle", "pageHeading"));
    }
    public function data()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return DataTables::of($categories)
            ->addColumn('edit', function ($category) {
                return '<a href="' . route('admin.categories.edit', $category) . '" class="btn btn-warning">Edit</a>';
            })
            ->addColumn('delete', function ($category) {
                return '<a href="' . route('admin.categories.delete', $category) . '" class="btn btn-danger delete-action">Delete</a>';
            })
            ->editColumn('created_at', function ($category) {
                return Carbon::parse($category->created_at);
            })
            ->rawColumns(['created_at', 'edit', 'delete'])
            ->toJson();
    }
    public function create()
    {
        $pageTitle = "Create Category";
        $pageHeading = "Create Category";
        return view("category::create", compact("pageTitle", "pageHeading"));
    }
    public function store(CategoryRequest $request)
    {
        $category = $request->except(['_token']);
        $this->categoryRepository->create($category);
        return redirect()->route('admin.categories.index')->with('msg', __('category::messages.create.success'));
    }
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            abort(404);
        }
        $pageTitle = "Edit Category";
        $pageHeading = "Edit Category";
        return view("category::edit", compact("pageTitle", "pageHeading", "category"));
    }
    public function update($id, CategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);
        $name_old = $category->name;
        if (!$category) {
            abort(404);
        }
        $this->categoryRepository->update($category->id, $request->except(['_token']));
        $category = $this->categoryRepository->find($id);
        $name_new = $category->name;
        return back()->with('msg', __('category::messages.update.success', [
            'id' => $category->id,
            'name_old' => $name_old,
            'name_new' => $name_new,
            'time' => timeDate()

        ]));
    }
    function delete($id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            abort(404);
        }
        $this->categoryRepository->delete($category->id);
        return back()->with('msg', __('category::messages.delete.success', [
            'id' => $category->id,
            'name' => $category->name,
            'time' => timeDate()
        ]));
    }
}