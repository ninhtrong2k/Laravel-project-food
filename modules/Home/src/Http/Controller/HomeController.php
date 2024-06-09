<?php
namespace Modules\Home\Src\Http\Controller;

use App\Http\Controllers\Controller;
use Modules\Product\Src\Repositories\ProductRepositoryInterface;

class HomeController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        return view('home::index');
    }
}