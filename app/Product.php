<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;
    //
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'image', 'spl_price', 'category_id', 'stock'];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'product.name' => 10,
            'product.description' => 10,
        ],
        'joins' => [
            'categories' => ['product.category_id','categories.id'],
        ],
    ];
/* 
    public function categories()
    {
        return $this->belongToMany('Category', 'categories');
    }
 */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
