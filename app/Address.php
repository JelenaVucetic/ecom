<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Address
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $street
 * @property int $zip
 * @property int $user_id
 * @property int $order_id
 * @property string $city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereZip($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    //
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'firstname', 'lastname', 'email', 'street', 'zip', 'city'];


}
