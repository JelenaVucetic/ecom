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
    protected $fillable = ['total', 'status'];

    public function orderFields() {
        return $this->belongsToMany(Product::class)->withPivot('qty'. 'total')->withTimestamps();
    }

    public static function createOrder() {
        if (Auth::check()) {
          $user = Auth::user();
          //dd($user);

          
        $order = $user->orders()->create([
            'total' => Cart::total(),
            'status' => 'pending'
        ]);
    
        } else {
            $order = new Order;
            $order->user_id = 0;
            $order-> total = Cart::total();
            $order-> status = 'pending';
            $order->save();
        }
        
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) { 
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty , 'tax' => Cart::tax(), 
                'total' => $cartItem->qty * $cartItem->price]);
            $order-> save();
        }
    }

}
