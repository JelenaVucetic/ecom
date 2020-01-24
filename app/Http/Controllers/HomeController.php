<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Recommends;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('home', compact('products', 'categories'));
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('shop', compact('products', 'categories'));
    }

    public function product_details($id)
    {
      /*   $products = Product::findOrFail($id);
        return view('product_details', compact('products')); */

        if(Auth::check()) {
            $recommends = new Recommends;
            $recommends->uid = Auth::user()->id;
            $recommends->pro_id = $id;
            $recommends->save();
        } else {
            $recommends = new Recommends;
            $recommends->uid = 0;
            $recommends->pro_id = $id;
            $recommends->save();
        }

        $Products = DB::table('product')->where('id', $id)->get();
        return view('product_details', compact('Products'));
    }

    public function viewWishlist()
    {
        $Products = DB::table('wishlist')->leftJoin('product', 'wishlist.pro_id', '=', 'product.id')->get();
        return view('wishlist', compact('Products'));
    }

    public function wishlist(Request $request) 
    {
        $wishlist = new Wishlist;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->pro_id = $request->pro_id;

        $wishlist->save();
        
        $Products = DB::table('product')->where('id', $request->pro_id)->get();

        return view('product_details', compact('Products'));
    }

    public function destroy($id) {
        DB::table('wishlist')->where('pro_id', '=', $id)->delete();
        return back()->with('msg', 'item removed from wishlist');
    }
}
