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
       $countTotal=0;
       foreach($cartItems as $c) {
         $countTotal = $c->qty + $countTotal;
       }

       if( $countTotal >= 3 &&  $countTotal < 5 ) {
         $cartSubTotal = Cart::subtotal() * 0.9;
        } elseif ( $countTotal >= 5 ) {
            $cartSubTotal = Cart::subtotal() * 0.8;
        } else {
            $cartSubTotal = Cart::subtotal();
        } 

        return view('cart.index', compact('cartItems', 'cartSubTotal'));
    }

    public function addItem(Request $request, $id)
    {
        $product = Product::find($id);
        if($product->spl_price==0) {
         $cart= Cart::add( $id, $product->name, 1, $product->price, 0, ['img'=> $product->image, 'stock' => $product->stock]);
 
        } else {
        $cart=  Cart::add( $id, $product->name, 1, $product->spl_price, 0, ['img'=> $product->image, 'stock' => $product->stock]);
        }

        return back();
    }

    public function destroy($id)
    {
       Cart::remove($id);
       return back();
    }

    public function updateCart(Request $request, $id)
    {
        $qty = $request->qty;
        $proId = $request->proId;
        $rowId = $request->rowId;
        $item = Cart::get($rowId);
        Cart::update($rowId, $qty);
        $cartItems = Cart::content();
         $countTotal=0;
        foreach($cartItems as $c) {
          $countTotal = $c->qty + $countTotal;
        }
      // return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');

        if( $countTotal >= 3 &&  $countTotal < 5 ) {
            $cartSubTotal = Cart::subtotal() * 0.9;
        } elseif ( $countTotal >= 5 ) {
            $cartSubTotal = Cart::subtotal() * 0.8;
          //  Cart::update('subtotal' => $cartSubTotal);
        } else {
            $cartSubTotal = Cart::subtotal();
        } 
        
       
       // dd(Cart::content());
        return response()->json([
            "qty" =>  $qty,
            'subtotal' => $item->subtotal(),
            'cartTotal' => $cartSubTotal
        ]); 
    }
}
 