<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['firstname', 'lastname', 'email', 'street', 'zip', 'city'];

}
