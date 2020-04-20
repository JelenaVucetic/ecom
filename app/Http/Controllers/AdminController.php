<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Order;
use App\User;
use App\Category;

class AdminController extends Controller
{
    public function index() {
        $categories = Category::where('parent_id',NULL)->get();

        $data = DB::table('address')
        ->join('orders', 'orders.id', '=', 'address.order_id')
        ->join('order_product', 'order_product.order_id', '=', 'orders.id')
        ->join('product', 'product.id', '=', 'order_product.product_id')
        ->select('address.order_id','address.firstname', 'address.lastname', 'address.email',
        'address.street', 'address.zip','address.user_id' , 'address.city', 
        'product.name', 'order_product.qty', 'order_product.total', 'order_product.size')
         ->get();
        // dd($data);

        return view('admin.index', compact('data', 'categories'));
    }
}
