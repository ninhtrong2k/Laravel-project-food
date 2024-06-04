<?php
namespace Modules\Dashboard\Src\Http\Controller\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
    }
    public function index() {
        $pageTitle = "Category management";
        $pageHeading = "Category management";
        $generate = true;
        return view('dashboard::clients.index', compact('pageTitle','pageHeading','generate'));    }
}