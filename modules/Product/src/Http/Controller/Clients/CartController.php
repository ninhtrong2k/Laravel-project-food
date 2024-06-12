<?php
namespace Modules\Product\Src\Http\Controller\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {
    }
    public function index(Request $request){
        $breadCrumb = 'Carts';
        $pageBreadCrumb = 'Carts Details';
        $currentUrl = $request->url();

        return view('product::clients.cart', compact('breadCrumb', 'pageBreadCrumb','currentUrl'));
    }
    public function checkOutCart(Request $request){
        $breadCrumb = 'Carts';
        $pageBreadCrumb = 'Checkout';
        $currentUrl = $request->url();
        return view('product::clients.checkout', compact('breadCrumb', 'pageBreadCrumb','currentUrl'));
    }
}