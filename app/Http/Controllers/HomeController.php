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
        $categories = Category::where('parent_id',NULL)->get();
        return view('home', compact('products', 'categories'));
    }

    public function welcome()
    {
        $products = Product::all();
        $categories = Category::where('parent_id',NULL)->get();
        return view('welcome', compact('products', 'categories'));
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::where('parent_id',NULL)->get();
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

    public function show_category_product($id)
    {
        $products = Category::find($id)->products;
        $categories = Category::where('parent_id',NULL)->get();

        return view('show_category_product', compact(['categories', 'products']));
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

    public function selectSize(Request $request)
    {
        $proDum = $request->proDum;
        $size = $request->size;

        $s_price = DB::table('products_properties')->where('pro_id', $proDum)->where('size', $size)->get();

        foreach($s_price as $sPrice) {
            echo "&euro;" . $sPrice->p_price;
        }
    }

    public function addReview(Request $request)
    {
        $this->validate($request, [
          
            'person_name' => 'required|min:3|max:35',
            'review_title' => 'required|min:3|max:35',
            'review_content' => 'required|min:3|max:35',
        ],
            [
                'person_name.required' => 'Enter Your Name',
                'review_title.required' => 'Enter Title',
                'review_content.required' => 'Enter description',
            ]);
        DB::table('reviews')->insert(['person_name' => $request->person_name,
                                    'product_id' => $request->product_id,
                                    'review_title' => $request->review_title, 
                                    'review_content' => $request->review_content,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s")
                                    ]);
        return back();
    }


    public function showReview(){
        $userId = Auth::user()->id;
        DB::table('users')->join('orders', 'orders.user_id' , '=', 'users.id')
        ->join('order_product', 'orders.id','=','order_product.order_id')
        ->where('users.id', $userId)
        ->where('order_product.order_id', $userId)->get();
    }
}
