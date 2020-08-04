<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProductProperty
 *
 * @property int $id
 * @property int $pro_id
 * @property string $size
 * @property string $color
 * @property string|null $p_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty wherePPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty whereProId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProductProperty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductProperty extends Model
{
    //
    protected $table = 'products_properties';
    protected $fillable = ['pro_id', 'size', 'color', 'p_price'];
}
