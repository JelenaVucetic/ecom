<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property string $status
 * @property string $total
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $order_number
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $orderFields
 * @property-read int|null $order_fields_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primarykey='id';
    protected $fillable = ['total', 'status', 'size', 'color', 'print', 'phone_model', 'case_style', 'custom_case', 'poster_size', 'picture_size', 'kids_size'];

    public function orderFields() {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total', 'size', 'color', 'print', 'phone_model', 'case_style', 'custom_case', 'poster_size', 'picture_size', 'kids_size')->withTimestamps();
    }

    public static function createOrder($order_number) {
        if (Auth::check()) {
          $user = Auth::user();

          
        $order = $user->orders()->create([
            'total' => Cart::total(),
            'status' => 'pending',
            'order_number' => $order_number
        ]);
    
        } else {
            $order = new Order;
            $order->user_id = 0;
            $order->total = Cart::total();
            $order->status = 'pending';
            $order->order_number = $order_number;
            $order->save();
        }
        
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) { 
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty , 'tax' => Cart::tax(), 
                'total' => $cartItem->qty * $cartItem->price,
                'size' => $cartItem->options->size,
                'color' => $cartItem->options->color,
                'print' => $cartItem->options->print,
                'phone_model' => $cartItem->options->phoneModel,
                'case_style' => $cartItem->options->caseStyle,
                'custom_case' => $cartItem->options->customCase,
                'poster_size' => $cartItem->options->posterSize,
                'picture_size' => $cartItem->options->pictureSize,
                'kids_size' => $cartItem->options->kidssize   ]);
            $order-> save();
        }

        return $order->id;
    }

}
