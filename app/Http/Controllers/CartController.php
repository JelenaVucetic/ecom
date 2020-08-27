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
            $cartSubTotal = $cartSubTotal * 0.85;
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

        if($cartSubTotal > 35) {
            $shipping = 0;
        } else {
            $shipping = 3;
        }

       
    
        return view('cart.index', compact('cartItems', 'cartSubTotal', 'categories', 'countTotal', 'oldPrice', 'ads', 'order_number', 'shipping'));
    }

    public function addItem(Request $request, $id)
    {
        $product = Product::find($id);

        /* foreach($product->images as $image){
            dd($image->name);
        } */
          /* dd($request);  */
        if($product->category->name == "T-Shirts"){
            if($product->gender == "female"){
            $imageFront = DB::table('images')->where([
                ['product_id', "=", $id],
                ['color' , "=", $request->color],
                ['position' , "=", $request->print],
            ])->first();

            }elseif($product->gender == "male"){
                $imageFront = DB::table('images')->where([
                    ['product_id', "=", $id],
                    ['color' , "=", $request->color],
                    ['position' , "=", $request->print],
                ])->first();
            }else{
                $pictures = DB::table('images')->where([
                    ['product_id', "=", $id],
                    ['color' , "=", $request->color],
                    ['position' , "=", $request->print],
                ])->get();

               $imageFront = $pictures[0];
            }
        }elseif($product->category->name == "Iphone Cases" || $product->category->name == "Samsung Cases" || $product->category->name == "Samsung Cases"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color',"=" ,$request->caseStyle],
                ['size' , '=', $request->phoneModel]
            ])->first();
        }elseif($product->category->name == "Custom"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color',"=" ,$request->caseStyle]
            ])->first();
        } elseif($product->category->name=="Posters"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['size',"=" ,$request->posterSize],
                ['color', '=', $request->color]
            ])->first();
        }elseif($product->category->name=="Canvas Art"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id]
            ])->first();
        }elseif($product->category->name=="Wallpapers"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id]
            ])->first();
        }elseif($product->category->name=="Tote Bags") {
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', $request->color]
            ])->first();
        }elseif($product->category->name=="Coasters"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['size','=', $request->coasterShape]
            ])->first();
        }elseif($product->category->name=="Clocks"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', $request->color]
            ])->first();
        } elseif( $product->category->name=="Puzzles" ||  $product->category->name=="Thermoses"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id]
            ])->first();
        }elseif($product->category->name=="Makeup Bags"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', $request->color]
            ])->first();
        } elseif($product->category->name=="Masks" || $product->category->name=="Gift Bags" || $product->category->name=="Notebooks" || $product->category->name=="Mugs" ){
            dd('fsdfs');
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['color','=', $request->color]
            ])->first();
        } elseif($product->category->name=="Magnets"){
            $imageFront = DB::table('images')->where([
                ['product_id',"=", $id],
                ['size', '=' , $request->sackType]
            ])->first();
        }

        if($product->spl_price==0) {
            $cart= Cart::add( $id, $product->name, 1, $request->price, 0,
                         ['cat' => $product->category->name, 'img'=> $imageFront->name, 'size' => $request->size, 'color' => $request->color, 'print' => $request->print ,
                         'phoneModel' => $request->phoneModel ,'caseStyle' => $request->caseStyle, 'customCase' => $request->customCase,
                         'posterSize' => $request->posterSize, 'pictureSize' => $request->pictureSize,
                         'kidssize' => $request->kidssize, 'kidscolor' => $request->kidscolor, 'customSize' => $request->customSize,
                         'coasterShape' => $request->coasterShape, 'coasterDesign' => $request->coasterDesign, 'maskLocation' => $request->maskLocation,
                          'sackType' => $request->sackType, 'magnetShape' => $request->magnetShape ]);
        } else {
            $cart=  Cart::add( $id, $product->name, 1, $product->spl_price, 0,
                        ['cat' => $product->category->name,'img'=> $imageFront->name, 'size' => $request->size, 'color' => $request->color, 'print' => $request->print,
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

    public function shippingPrice(Request $request){
        
        $subtotal = str_replace('€','',$request->subtotal);
        $subtotal = (float)$subtotal;
 
        $countTotal=0;
        foreach(Cart::content() as $c) {
            $countTotal = $c->qty + $countTotal;
        }

        if($request->city == "Podgorica")
        {
            if( $countTotal <3  && $subtotal >= 35)
            {
                $shipping = 0;
                $subtotal = $subtotal + $shipping;
            } else if ( $countTotal >=5  && Cart::subtotal() >= 35) {
                $shipping = 0;
                $subtotal = ($subtotal + $shipping)* 0.85;
            } else if ( $countTotal <3  && $subtotal < 35) {
                $shipping = 2;
                $subtotal = $subtotal + $shipping;
            } else if ( $countTotal >=3 &&  $countTotal <5  && $subtotal >= 35) {
                $shipping = 0;
                $subtotal = ($subtotal + $shipping) * 0.9;
            } else if ( $countTotal >=3 &&  $countTotal <5  && $subtotal < 35) {
                $shipping = 2;
                $subtotal = ($subtotal + $shipping) * 0.9;
            } else  {
                $shipping = 2;
                $subtotal = ($subtotal + $shipping) * 0.85;
            } 
        } else {
            if( $countTotal <3  && $subtotal >= 35)
            {
                $shipping = 0;
                $subtotal = $subtotal + $shipping;
            } else if ( $countTotal >=5  && $subtotal >= 35) {
                $shipping = 0;
                $subtotal = ($subtotal + $shipping) * 0.85;
            } else if ( $countTotal <3  && $subtotal < 35) {
                $shipping = 3;
                $subtotal = $subtotal + $shipping;
            } else if ( $countTotal >=3 &&  $countTotal <5  && $subtotal >= 35) {
        
                $shipping = 0;
                $subtotal = ($subtotal + $shipping) * 0.9;
            }  else if ( $countTotal >=3 &&  $countTotal <5  && $subtotal < 35) {
                $shipping = 3;
                $subtotal = ($subtotal + $shipping) * 0.9;
            } else  {
                $shipping = 3;
                $subtotal = ($subtotal + $shipping) * 0.85;
            } 
        }
       
      
        $subtotal = number_format((float)$subtotal, 2, '.', ''); 
        return response()->json(["subtotal" => $subtotal, 'shipping' => $shipping]);
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


        if($request->city == "Podgorica")
        {
            if( $countTotal <3  && Cart::subtotal() >= 35)
            {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var;
                $shipping = 0;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal >=5  && Cart::subtotal() >= 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.85;
                $shipping = 0;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal <3  && Cart::subtotal() < 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var;
                $shipping = 2;
                $cartSubTotal = $cartSubTotal + $shipping;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal >=3 &&  $countTotal <5  && Cart::subtotal() >= 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.9;
                $shipping = 0;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal >=3 &&  $countTotal <5  && Cart::subtotal() < 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.9;
                $shipping = 2;
                $cartSubTotal = $cartSubTotal + $shipping;
                $cartSubTotalOld = Cart::subtotal();
            } else  {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.85;
                $shipping = 2;
                $cartSubTotal = $cartSubTotal + $shipping;
                $cartSubTotalOld = Cart::subtotal();
            } 
        } else {
            if( $countTotal <3  && Cart::subtotal() >= 35)
            {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var;
                $shipping = 0;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal >=5  && Cart::subtotal() >= 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.85;
                $shipping = 0;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal <3  && Cart::subtotal() < 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var;
                $shipping = 3;
                $cartSubTotal = $cartSubTotal + $shipping;
                $cartSubTotalOld = Cart::subtotal();
            } else if ( $countTotal >=3 &&  $countTotal <5  && Cart::subtotal() >= 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.9;
                $shipping = 0;
                $cartSubTotalOld = Cart::subtotal();
            }  else if ( $countTotal >=3 &&  $countTotal <5  && Cart::subtotal() < 35) {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.9;
                $shipping = 3;
                $cartSubTotal = $cartSubTotal + $shipping;
                $cartSubTotalOld = Cart::subtotal();
            } else  {
                $var = Cart::subtotal();
                $var = str_replace(',','',$var);
                $cartSubTotal = (float)$var * 0.85;
                $shipping = 3;
                $cartSubTotal = $cartSubTotal + $shipping;
                $cartSubTotalOld = Cart::subtotal();
            } 
        }
       
       

       


        return response()->json([
            "qty" =>  $qty,
            'subtotal' => $item->subtotal(),
            'cartTotal' => number_format((float)$cartSubTotal, 2, '.', ''),
            'oldPrice' =>  $oldPrice,
            'countTotal' => $countTotal,
            'cartCount' => $cartCount,
            'shipping' => $shipping,
            'cartSubTotalOld' => number_format((float)$cartSubTotalOld, 2, '.', '')
        ]);
    }
}
