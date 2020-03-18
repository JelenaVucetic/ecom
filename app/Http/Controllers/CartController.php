<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        $categories = Category::where('parent_id',NULL)->get();
        $oldPrice =  Cart::subtotal();
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

        return view('cart.index', compact('cartItems', 'cartSubTotal', 'categories', 'countTotal', 'oldPrice'));
    }

    public function addItem(Request $request, $id)
    {
        $product = Product::find($id);
        if($product->spl_price==0) {
         $cart= Cart::add( $id, $product->name, 1, $product->price, 0, ['img'=> $product->image]);
 
        } else {
        $cart=  Cart::add( $id, $product->name, 1, $product->spl_price, 0, ['img'=> $product->image]);
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
        $oldPrice =  Cart::subtotal();

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
            'cartTotal' => $cartSubTotal,
            'oldPrice' =>  $oldPrice,
            'countTotal' => $countTotal
        ]); 
    }
}
 