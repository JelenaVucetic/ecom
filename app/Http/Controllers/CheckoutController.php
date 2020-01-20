<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Address;
use App\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        return view('checkout', compact('cartItems'));
    }
    public function formvalidate(Request $request)
    {
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

        if (Auth::check()) {
            $userid = Auth::user()->id;
        } else {
            $userid = '0';
        }
        
        $address = new Address;
        $address->firstname = $request->firstname;
        $address->lastname = $request->lastname;
        $address->email = $request->email;
        $address->street = $request->street;
        $address->zip = $request->zip;
        $address->city = $request->city;
        $address->user_id = $userid;
        $address->save();
     
        
        Order::createOrder();
      
        

        Cart::destroy();
        if(Auth::user()) {
            return view('profile.index');
        } else {
            return view('profile.thankyou');
        }
      
    }

}
