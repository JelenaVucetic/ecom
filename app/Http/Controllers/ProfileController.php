<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index() {
        return view('profile.index');
    }

    public function orders() {
        $user_id = Auth::user()->id;
        $orders = DB::table('orders_product')->leftJoin('product', 'product.id', '=', 'orders_product.product_id')->
                    leftJoin('orders', 'orders.id', '=', 'orders_product.orders_id')->
                    where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }
}
