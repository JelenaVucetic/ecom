<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Recommends
 *
 * @property int $id
 * @property int $pro_id
 * @property int $uid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends whereProId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Recommends whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Recommends extends Model
{
    //
    protected $table = 'recommends';
    protected $fillable = ['pro_id', 'uid'];


    public function images(){
        return $this->hasMany(Image::class);
    }
}
