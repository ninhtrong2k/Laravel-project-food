<?php 
namespace Modules\User\Src\Repositories;
use Modules\User\Src\Models\User;
use App\Repositories\BaseRepository;
use Modules\User\Src\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
    public function getModel(){
        return User::class;
    } 
    public function getAllUser(){
        return $this->model->select(['id','name','email','created_at'])->latest();
    }
}