<?php
namespace Modules\User\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    // protected $table = 'test';
    protected $fillable = [
        'name', 'email', 'password'
    ];
}