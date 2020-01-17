<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
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
    }

}
