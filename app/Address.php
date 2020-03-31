<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'firstname', 'lastname', 'email', 'street', 'zip', 'city'];


}
