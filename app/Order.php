<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primarykey='id';
    protected $fillable = ['total', 'status', 'size', 'color', 'print', 'phone_model', 'case_style', 'custom_case', 'poster_size', 'picture_size', 'kids_size', 'order_number'];

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
