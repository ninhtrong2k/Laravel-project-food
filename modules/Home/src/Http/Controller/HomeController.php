<?php
namespace Modules\Home\Src\Http\Controller;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
    }
    public function index() {
        return view('home::index');   
     }
}