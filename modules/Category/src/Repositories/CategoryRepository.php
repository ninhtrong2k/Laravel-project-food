<?php 
namespace Modules\Category\Src\Repositories;
use App\Repositories\BaseRepository;
use Modules\Category\Src\Models\Category;
use Modules\Category\Src\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface {
    public function getModel(){
        return Category::class;
    } 
    public function getAllCategories(){
        return $this->model->select(['id','name','created_at'])->latest();
    }

}