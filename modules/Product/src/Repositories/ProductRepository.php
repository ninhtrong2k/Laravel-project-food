<?php
namespace Modules\Product\Src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Product\Src\Models\Product;
use Modules\Product\Src\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }
    public function getAllProduct()
    {
        return $this->model->select(['id', 'name', 'category_id', 'image', 'category_id', 'view', 'quantity', 'created_at'])->latest();
    }
    public function getProduct($category, $limit = 8)
    {
        $query = $this->model->select(['id', 'name', 'category_id', 'image', 'category_id', 'view', 'quantity','price', 'created_at']);
        if ($category != 999) {
            $query->where('category_id', '=', $category);
        }
        return $query->limit($limit)->get();
    }
}