<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Address;
use App\Order;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function thankyou() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('profile.thankyou', compact('categories'));
    }

    public function formvalidate(Request $request)
    {
        $categories = Category::where('parent_id',NULL)->get();
        $this->validate($request, [
          
            'firstname' => 'required|min:2|max:35',
            'lastname' => 'required|min:2|max:35',
            'email' => 'required|email',
            'phone' => 'required|max:12',
            'street' => 'required|min:3|max:35',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'city' => 'required|min:2|max:35'
        ],
            [
                'firstname.required' => 'Enter First Name',
                'lastname.required' => 'Enter Last Name',
                'email.required' => 'Please enter your email',
                'email.email' => 'Your email is not valid',
                'phone.required' => 'Please enter your phone number',
                'phone.max' => 'Your phone number cannot have more then 12 characters',
                'street.required' => 'Please enter your street name',
                'zip.required' => 'Please enter your zip',
                'zip.reges' => 'Zip must have 5 digits',
                'city.required' => 'Please enter your city name',
            ]);

        if (Auth::check()) {
            $userid = Auth::user()->id;
        } else {
            $userid = '0';
        }
     
        $id_order = Order::createOrder();
        
        $address = new Address;
        $address->order_id = $id_order;
        $address->firstname = $request->firstname;
        $address->lastname = $request->lastname;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->street = $request->street;
        $address->zip = $request->zip;
        $address->city = $request->city;
        $address->user_id = $userid;
        $address->save();
      
        

        Cart::destroy();
        if(Auth::user()) {
            return view('profile.index', compact('categories'));
        } else {
            return view('profile.thankyou', compact('categories'));
        }
      
    }

}
