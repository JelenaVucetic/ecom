<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'image', 'spl_price'];
}
