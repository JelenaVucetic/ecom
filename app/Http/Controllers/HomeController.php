<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
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
        return view('home');
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function product_details($id)
    {
        $products = Product::findOrFail($id);

        return view('product_details', compact('products'));
    }
}
