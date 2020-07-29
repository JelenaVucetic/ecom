<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommends extends Model
{
    //
    protected $table = 'recommends';
    protected $fillable = ['pro_id', 'uid'];


    public function images(){
        return $this->hasMany(Image::class);
    }
}
