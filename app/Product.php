<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'image', 'spl_price', 'category_id', 'stock'];
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

}
