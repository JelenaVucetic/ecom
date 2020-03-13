<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
