<?php
namespace Modules\Evaluation\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    // protected $table = 'test';
    protected $fillable = [
        'user_id',
        'product_id',
        'email',
        'content',
        'star',
    ];
}