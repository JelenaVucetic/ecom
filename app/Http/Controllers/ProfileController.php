<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\Order;
use App\Product;
use App\Category;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;    
class ProfileController extends Controller
{
    //
    public function index() {
        $categories = Category::where('parent_id',NULL)->get();
        $user_id = Auth::user()->id;

        $orders = DB::table('order_product')->leftJoin('product', 'product.id', '=', 'order_product.product_id')->
                    leftJoin('orders', 'orders.id', '=', 'order_product.order_id')->
                    where('orders.user_id', '=', $user_id)->get();
        return view('profile.index', compact('categories', 'orders'));
    }



    public function address() {
        $categories = Category::where('parent_id',NULL)->get();

        $user_id = Auth::user()->id;

        $user = Address::where('user_id', '=',  $user_id)->first();
        if ($user === null) {
            return view('profile.fill-address', compact('address_data', 'categories'));
        } else {
            $address_data = DB::table('address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->first();
        //dd( $address_data);
            return view('profile.address', compact('address_data', 'categories'));
        }

       
    }

    public function createAddress(Request $request) {
        $categories = Category::where('parent_id',NULL)->get();

        $this->validate($request, [
          
            'firstname' => 'required|min:3|max:35',
            'lastname' => 'required|min:3|max:35',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required|min:3|max:35',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required|min:3|max:35'
        ],
            [
                'firstname.required' => 'Enter First Name',
                'lastname.required' => 'Enter Last Name',
                'email.required' => 'Pleaste enter valid email',
                'phone.required' => 'Plese enter your phone number',
                'street.required' => 'Enter Street',
                'zip.required' => 'Zip is not valid',
                'city.required' => 'Enter City',
            ]);
        
        $userid = Auth::user()->id;

        DB::table('address')->insert([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'zip' => $request->zip,
            'city' => $request->city,
            'user_id' => $userid,
            'created_at' => now()
        ]);

         $address_data = DB::table('address')->where('user_id', '=', $userid)->orderby('id', 'DESC')->first();
        //dd( $address_data);
        return view('profile.address', compact('address_data', 'categories'));
    }

    public function updateAddress(Request $request) {
        //echo 'here is query for updating address';
        //dd($request->firstname);
        $this->validate($request, [
          
            'firstname' => 'required|min:3|max:35',
            'lastname' => 'required|min:3|max:35',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required|min:3|max:35',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required|min:3|max:35'
        ],
            [
                'firstname.required' => 'Enter First Name',
                'lastname.required' => 'Enter Last Name',
                'email.required' => 'Pleaste enter valid email',
                'phone.required' => 'Plese enter your phone number',
                'street.required' => 'Enter Street',
                'zip.required' => 'Zip is not valid',
                'city.required' => 'Enter City',
            ]);
        
        $userid = Auth::user()->id;
        DB::table('address')->where('user_id', $userid)->update($request->except('_token'));
        return back()->with('msg', 'Your address has been updated');
    }

    public function password() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('profile.password', compact('categories'));
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return back()->with('msg', 'You have change your password successfuly!');

    }
}
