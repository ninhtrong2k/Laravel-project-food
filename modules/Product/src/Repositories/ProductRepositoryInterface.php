<?php
namespace Modules\Product\Src\Repositories;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getAllProduct();
    public function getProduct($category, $limit = 8);
    public function getProducts($limit,$data=[]);
    public function countProducts( $data = []);

}