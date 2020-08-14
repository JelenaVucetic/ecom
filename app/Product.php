<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


/**
 * App\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $category_id
 * @property string $price
 * @property string $image
 * @property string $spl_price
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $design_id
 * @property string|null $price_b2
 * @property string|null $price_b1
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceB1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceB2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSplPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use SearchableTrait;
    //
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'image', 'spl_price', 'category_id'];

    protected $searchable = [
        /**
         * Columns and their priority in search results
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'product.name' => 10,
            'product.description' => 10,
        ],
        'joins' => [
            'categories' => ['product.category_id','categories.id'],
        ],
    ];
/* 
    public function categories()
    {
        return $this->belongToMany('Category', 'categories');
    }
 */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }
}
