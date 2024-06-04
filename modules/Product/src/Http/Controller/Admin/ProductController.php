<?php
namespace Modules\Product\Src\Http\Controller\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
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
}