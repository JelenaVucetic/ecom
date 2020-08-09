<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Address;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $cartItems = Cart::content();
        $categories = Category::where('parent_id',NULL)->get();
        $oldPrice =  Cart::subtotal();
        $countTotal=0;
        foreach($cartItems as $c) {
            $countTotal = $c->qty + $countTotal;
        }
        if( $countTotal >= 3 &&  $countTotal < 5 ) {
            $cartSubTotal = strpos(Cart::subtotal(),'.')!==false ? rtrim(rtrim(Cart::subtotal(),'0'),'.') : Cart::subtotal();
            $cartSubTotal = str_replace( ',', '', $cartSubTotal);
            $cartSubTotal = $cartSubTotal * 0.9;
        } elseif ( $countTotal >= 5 ) {
            $cartSubTotal = strpos(Cart::subtotal(),'.')!==false ? rtrim(rtrim(Cart::subtotal(),'0'),'.') : Cart::subtotal();
            $cartSubTotal = str_replace( ',', '', $cartSubTotal);
            $cartSubTotal = $cartSubTotal * 0.8;
        } else {
            $cartSubTotal = Cart::subtotal();
        }

        $ads = null;

        if(Auth::check()) {
            $ads = DB::table('user_address')->where('user_id', '=', Auth::user()->id)->orderby('id', 'DESC')->first();
            if($ads) {
                $ads = $ads;
            } else {
                $ads = null;
            }
        }

        $latestOrder = Order::orderBy('created_at','DESC')->first();
        if($latestOrder) {
            $order_number = 'U1-'.str_pad($latestOrder->id + 1, 6, "0", STR_PAD_LEFT);
        } else {
            $order_number = "U1-000001";
        }

        return view('cart.index', compact('cartItems', 'cartSubTotal', 'categories', 'countTotal', 'oldPrice', 'ads', 'order_number'));
    }

    public function addItem(Request $request, $id)
    {
        $product = Product::find($id);

        if($product->category->name == "T-Shirts"){
            if($product->gender == "female"){
            $imageFront = DB::table('images')->where([
                ['product_id', "=", $id],
                ['color' , "=", 'white'],
                ['position' , "=", 'front'],
            ])->first();

            }elseif($product->gender == "male"){
                $imageFront = DB::table('images')->where([
                    ['product_id', "=", $id],
                    ['color' , "=", 'white'],
                    ['position' , "=", 'front'],
                ])->first();
            }else{
                $pictures = DB::table('images')->where([
                    ['product_id', "=", $id],
                    ['color' , "=", 'white'],
                    ['position' , "=", 'front'],
                ])->get();

               $imageFront = $pictures[0];
            }

        }elseif($product->category->name == "Iphone Cases"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color',"=" ,'transparent']
            ])->first();

        }elseif($product->category->name == "Samsung Cases"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color',"=" ,'transparent']
            ])->first();
        }elseif($product->category->name == "Huawei Cases"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color',"=" ,'transparent']
            ])->first();
        }elseif($product->category->name=="Posters"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['size',"=" ,'A3'],
                ['color', '=', 'white']
            ])->first();
        }elseif($product->category->name=="Pictures"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id]
            ])->first();
        }elseif($product->category->name=="Wallpapers"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['size','=', 'vertical']
            ])->first();
        }elseif($product->category->name=="Tote Bags") {
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', 'black']
            ])->first();
        }elseif($product->category->name=="Coasters"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['size','=', 'square']
            ])->first();
        }elseif($product->category->name=="Clocks"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', 'black']
            ])->first();
        } elseif($product->category->name=="Makeup Bags" || $product->category->name=="Puzzles"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id]
            ])->first();
        } elseif($product->category->name=="Masks" || $product->category->name=="Gift Bags"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', 'white']
            ])->first();
        } elseif($product->category->name=="Magnets"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
            ])->first();
        }


        if($product->spl_price==0) {
            $cart= Cart::add( $id, $product->name, 1, $request->price, 0,
                         ['img'=> $imageFront->name, 'size' => $request->size, 'color' => $request->color, 'print' => $request->print ,
                         'phoneModel' => $request->phoneModel ,'caseStyle' => $request->caseStyle, 'customCase' => $request->customCase,
                         'posterSize' => $request->posterSize, 'pictureSize' => $request->pictureSize,
                         'kidssize' => $request->kidssize, 'kidscolor' => $request->kidscolor, 'customSize' => $request->customSize,
                         'coasterShape' => $request->coasterShape, 'coasterDesign' => $request->coasterDesign, 'maskLocation' => $request->maskLocation,
                          'sackType' => $request->sackType, 'magnetShape' => $request->magnetShape ]);
        } else {
            $cart=  Cart::add( $id, $product->name, 1, $product->spl_price, 0,
                        ['img'=> $imageFront, 'size' => $request->size, 'color' => $request->color, 'print' => $request->print,
                        'phoneModel' => $request->phoneModel ,'caseStyle' => $request->caseStyle, 'customCase' => $request->customCase,
                        'posterSize' => $request->posterSize, 'pictureSize' => $request->pictureSize,
                        'kidssize' => $request->kidssize, 'kidscolor' => $request->kidscolor, 'customSize' => $request->customSize,
                        'coasterShape' => $request->coasterShape, 'coasterDesign' => $request->coasterDesign,'maskLocation' => $request->maskLocation,
                         'sackType' => $request->sackType, 'magnetShape' => $request->magnetShape ]);
        }
        echo Cart::count();

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
        $cartCount =  Cart::count();

        $countTotal=0;
        foreach($cartItems as $c) {
          $countTotal = $c->qty + $countTotal;
        }

        if( $countTotal >= 3 &&  $countTotal < 5 ) {
            $cartSubTotal = Cart::subtotal() * 0.9;
        } elseif ( $countTotal >= 5 ) {
            $cartSubTotal = (float) Cart::subtotal() * 0.8;
        } else {
            $cartSubTotal = Cart::subtotal();
        }

        return response()->json([
            "qty" =>  $qty,
            'subtotal' => $item->subtotal(),
            'cartTotal' => $cartSubTotal,
            'oldPrice' =>  $oldPrice,
            'countTotal' => $countTotal,
            'cartCount' => $cartCount
        ]);
    }
}
