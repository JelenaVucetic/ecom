<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Wishlist
 *
 * @property int $id
 * @property int $user_id
 * @property int $pro_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereProId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Wishlist whereUserId($value)
 * @mixin \Eloquent
 */
class Wishlist extends Model
{
    //
    protected $table = 'wishlist';
    protected $fillable = ['user_id', 'pro_id'];
    //protected $primaryKey = ['user_id', 'pro_id'];
}
