<?php 
namespace Modules\Product\Src\Repositories;
use App\Repositories\BaseRepository;
use Modules\Product\Src\Models\Product;
use Modules\Product\Src\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface {
    public function getModel(){
        return Product::class;
    }
    public function getAllProduct(){
        return $this->model->select(['id','name','category_id','image','evaluate_id','view','quantity','created_at'])->latest();
    }
}