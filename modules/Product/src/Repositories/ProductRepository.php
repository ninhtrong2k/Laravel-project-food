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
        $query = $this->model->select(['id', 'name', 'category_id', 'image', 'category_id', 'view', 'quantity', 'price', 'created_at']);
        if ($category != 999) {
            $query->where('category_id', '=', $category);
        }
        return $query->limit($limit)->get();
    }

    public function getProducts($limit, $data = [])
    {
        $query = $this->model->latest();
        
        // Filter Price 
        if ($data && $data['priceInput1'] != 0 && $data['priceInput2'] != 0) {
            $priceInput1 = $data['priceInput1'];
            $priceInput2 = $data['priceInput2'];
            if ($data['priceInput1'] > $data['priceInput2']) {
                $priceInput1 = $data['priceInput2'];
                $priceInput2 = $data['priceInput1'];
            }
            $query->whereBetween('price', [$priceInput1, $priceInput2]);
        }

        // Filter category 
        if ($data && $data['selectedCategory'] != 999) {
            $query->where('category_id', '=', $data['selectedCategory']);
        }
        if ($data && $data['keywordInputs']) {
            $keyword =  $data['keywordInputs'];
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('detail', 'like', '%' . $keyword . '%');
            });
        }
        return $query->paginate($limit);
    }
    public function countProducts( $data = [])
    {
        $query = $this->model->latest();
        
        // Filter Price 
        if ($data && $data['priceInput1'] != 0 && $data['priceInput2'] != 0) {
            $priceInput1 = $data['priceInput1'];
            $priceInput2 = $data['priceInput2'];
            if ($data['priceInput1'] > $data['priceInput2']) {
                $priceInput1 = $data['priceInput2'];
                $priceInput2 = $data['priceInput1'];
            }
            $query->whereBetween('price', [$priceInput1, $priceInput2]);
        }

        // Filter category 
        if ($data && $data['selectedCategory'] != 999) {
            $query->where('category_id', '=', $data['selectedCategory']);
        }
        if ($data && $data['keywordInputs']) {
            $keyword =  $data['keywordInputs'];
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('detail', 'like', '%' . $keyword . '%');
            });
        }
        return $query->count();
    }
}