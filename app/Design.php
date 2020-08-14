<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Design
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Design whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Design extends Model
{
    protected $table = 'design';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function products() 
    {
        return $this->hasMany(Product::class);
    }

}
