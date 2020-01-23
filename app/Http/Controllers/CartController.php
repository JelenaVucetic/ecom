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
       //dd($cartItems);
        return view('cart.index', compact('cartItems'));
    }

    public function addItem($id) 
    {
        $product = Product::find($id);
        Cart::add( $id, $product->name, 1, $product->price, 0, ['img'=> $product->image, 'stock' => $product->stock]);
        return back();
    }

    public function destroy($id)
    {
       Cart::remove($id);
       return back();
    }

    public function update(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $product = Product::find($proId);
        $stock = $product->stock;

        if($qty<$stock) {
            $msg = 'Cart is updated';
            Cart::update($id, $request->qty);
            return back()->with('status', $msg);
        } else {
            $msg = 'Please check your qty is it morew than product stock';
            return back()-> with('error', $msg);
        }
    }
}
