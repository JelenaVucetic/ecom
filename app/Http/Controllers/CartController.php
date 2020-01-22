<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {    
        $cartItems = Cart::content();  
        dd($cartItems);
        return view('cart.index', compact('cartItems'));
    }

    public function addItem($id) 
    {
        $product = Product::find($id);

        Cart::add( $id, $product->name, 1, $product->price, 5, ['img'=> $product->image]);
        
     
        return back();
    }

    public function destroy($id)
    {
       Cart::remove($id);
       return back();
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, $request->qty);
        return back();
    }
}
