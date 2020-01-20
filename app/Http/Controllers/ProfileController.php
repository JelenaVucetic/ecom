<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    //
    public function index() {
        return view('profile.index');
    }

    public function orders() {
        $user_id = Auth::user()->id;
        $orders = DB::table('order_product')->leftJoin('product', 'product.id', '=', 'order_product.product_id')->
                    leftJoin('orders', 'orders.id', '=', 'order_product.order_id')->
                    where('orders.user_id', '=', $user_id)->get();
        return view('profile.orders', compact('orders'));
    }

    public function address() {
        return view('profile.address');
    }
}
