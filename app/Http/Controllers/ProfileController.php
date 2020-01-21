<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Order;
use App\Product;
use Hash;
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
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->get();
        //dd( $address_data);
        return view('profile.address', compact('address_data'));
    }

    public function updateAddress(Request $request) {
        //echo 'here is query for updating address';
        //dd($request->firstname);
        $this->validate($request, [
          
            'firstname' => 'required|min:3|max:35',
            'lastname' => 'required|min:3|max:35',
            'email' => 'required|email',
            'street' => 'required|min:3|max:35',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required|min:3|max:35'
        ],
            [
                'firstname.required' => 'Enter First Name',
                'lastname.required' => 'Enter Last Name',
                'email.required' => 'Pleaste enter valid email',
                'street.required' => 'Enter Street',
                'zip.required' => 'Zip is not valid',
                'city.required' => 'Enter City',
            ]);
        
        $userid = Auth::user()->id;
        DB::table('address')->where('user_id', $userid)->update($request->except('_token'));
        return back()->with('msg', 'Your address has been updated');
    }

    public function password() {
        return view('profile.password');
    }

    public function updatePassword(Request $request) {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        if(!Hash::check($oldPassword, Auth::user()->password)) {
            return back()->with('msg', 'The specified password does not match the database password');
        } else {
            $request->user()->fill(['password' => Hash::make($newPassword)])->save();
            return back()->with('msg', 'Password has been updated');
        }
    }
}
