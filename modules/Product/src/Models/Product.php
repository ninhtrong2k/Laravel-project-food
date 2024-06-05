<?php
namespace Modules\Product\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table = 'test';
    protected $fillable = [
        'name', 'slug', 'category_id', 'image', 'evaluate_id', 'view', 'quantity','description', 'status'
    ];
}