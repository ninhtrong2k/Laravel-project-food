<?php 
namespace Modules\Category\Src\Repositories;
use App\Repositories\RepositoryInterface;
interface CategoryRepositoryInterface extends RepositoryInterface {
    public function getAllCategories();

}