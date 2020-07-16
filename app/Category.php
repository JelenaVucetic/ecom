<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    protected $fillable = ['parent_id', 'name'];

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function childs() {
        return $this->hasMany(self::class,'parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }


    public function getParentsNames() {
        if($this->parent) {
            return $this->parent->getParentsNames();
        } else {
            return $this->name;
        }
    }
    
}
