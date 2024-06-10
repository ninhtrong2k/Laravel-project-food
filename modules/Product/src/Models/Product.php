<?php
namespace Modules\Product\Src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Src\Models\Category;
use Modules\Evaluation\Src\Models\Evaluation;

class Product extends Model
{
    use HasFactory;
    // protected $table = 'test';
    protected $fillable = [
        'name', 'slug', 'category_id', 'image', 'category_id', 'view', 'quantity','description', 'status'
    ];
    protected $with = ['categories','evaluations'];
    public function categories(){
        return $this->belongsTo(
            Category::class,
            'category_id',
            'id'
        );
    }
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'product_id', 'id');
    }
}