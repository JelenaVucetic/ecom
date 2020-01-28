<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    //
    protected $table = 'products_properties';
    protected $fillable = ['pro_id', 'size', 'color', 'p_price'];
}
