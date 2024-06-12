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
        $query = $this->model;
    
        // Sắp xếp
        if (isset($data['selectFilter'])) {
            if ($data['selectFilter'] == '0') {
                $query = $query->latest(); 
            }else if ($data['selectFilter'] == '2') {
                $query = $query->latest(); // Mới nhất
            } elseif ($data['selectFilter'] == '1') {
                $query = $query->oldest(); // Cũ nhất
            } elseif ($data['selectFilter'] == '3') {
                $query = $query->orderBy('price', 'desc'); // Giá cao nhất
            } elseif ($data['selectFilter'] == '4') {
                $query = $query->orderBy('price', 'asc'); // Giá thấp nhất
            }
        }else {
            $query = $query->latest(); 
        }
    
        // Lọc theo giá 
        if (isset($data['priceInput1']) && isset($data['priceInput2']) && $data['priceInput1'] != 0 && $data['priceInput2'] != 0) {
            $priceInput1 = min($data['priceInput1'], $data['priceInput2']);
            $priceInput2 = max($data['priceInput1'], $data['priceInput2']);
            $query = $query->whereBetween('price', [$priceInput1, $priceInput2]);
        }
    
        // Lọc theo danh mục 
        if (isset($data['selectedCategory']) && $data['selectedCategory'] != 999) {
            $query = $query->where('category_id', '=', $data['selectedCategory']);
        }
    
        // Lọc theo từ khóa
        if (isset($data['keywordInputs']) && !empty($data['keywordInputs'])) {
            $keyword = $data['keywordInputs'];
            $query = $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                      ->orWhere('detail', 'like', '%' . $keyword . '%');
            });
        }
    
        return $query->paginate($limit);
    }
    
    
    public function countProducts($data = [])
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
            $keyword = $data['keywordInputs'];
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('detail', 'like', '%' . $keyword . '%');
            });
        }
        return $query->count();
    }

    
}