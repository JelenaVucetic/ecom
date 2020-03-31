<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Address;
use App\Order;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Exchange\Client\Client;
use Exchange\Client\Data\Customer;
use Exchange\Client\Transaction\Debit;
use Exchange\Client\Transaction\Result;
use Exchange\Client\StatusApi\StatusRequestData;

class CheckoutController extends Controller
{

    public function thankyou() {
        $categories = Category::where('parent_id',NULL)->get();
        
        dd($statusResult);

        return view('profile.thankyou', compact('categories'));
    }

    public function error() {
        $categories = Category::where('parent_id',NULL)->get();


        return view('error', compact('categories'));
    }

    public function cancel() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('cancel', compact('categories'));
    }

    public function callback() {
        dd('here');
        $categories = Category::where('parent_id',NULL)->get();
        
        require_once(base_path() . '/vendor/allsecure-pay/php-exchange/initClientAutoload.php');

        $client = new Client("monargo", "d#70Ce=X&VTv=d_gvo4P6g.R3mGRs", "monargo-cc-simulator", "Tk3ObsC8inhbvGkLoP8Ibud3fGYXjK");

        $client->validateCallbackWithGlobals();
        $callbackResult = $client->readCallback(file_get_contents('php://input'));

        $myTransactionId = $callbackResult->getTransactionId();
        $gatewayTransactionId = $callbackResult->getReferenceId();

        if ($callbackResult->getResult() == Result::RESULT_OK) {
            //payment ok
            echo "here";
            dd('here');
            //finishCart();

        } elseif ($callbackResult->getResult() == Result::RESULT_ERROR) {
            //payment failed, handle errors
            $errors = $callbackResult->getErrors();
            dd('not there, here');
        }

        echo "OK";
        die;
    }


    public function formvalidate(Request $request)
    {
        $token = $request->transaction_token;
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

        // Include the autoloader (if not already done via Composer autoloader)
        require_once(base_path() . '/vendor/allsecure-pay/php-exchange/initClientAutoload.php');
        // Instantiate the "Exchange\Client\Client" with your credentials
        $client = new Client("monargo", "d#70Ce=X&VTv=d_gvo4P6g.R3mGRs", "monargo-cc-simulator", "Tk3ObsC8inhbvGkLoP8Ibud3fGYXjK");

        $customer = new Customer();
        $customer->setBillingCountry("ME")
                ->setFirstName($request->firstname)
                ->setLastName($request->lastname)
                ->setEmail($request->email)
                ->setIpAddress(request()->ip());

        $debit = new Debit();
        // define your transaction ID: e.g. 'myId-'.date('Y-m-d').'-'.uniqid()
        $merchantTransactionId = 'myId'.date('Y-m-d').'-'.uniqid(); 

        $debit->setTransactionId($merchantTransactionId)
            ->setSuccessUrl('http://ecom.example/thankyou')
            ->setCancelUrl('http://ecom.example/cancel')
            ->setErrorUrl('http://ecom.example/error')
            ->setCallbackUrl('http://ecom.example/callback')
            ->setAmount($request->amount)
            ->setCurrency('EUR')
            ->setCustomer($customer);

        //if token acquired via payment.js
        if (isset($token)) {
        $debit->setTransactionToken($token);
        }

        // send the transaction
        $result = $client->debit($debit);

        if ($result->isSuccess()) {
            //act depending on $result->getReturnType()
            $gatewayReferenceId = $result->getReferenceId(); //store it in your database
            
            if ($result->getReturnType() == Result::RETURN_TYPE_ERROR) {
                //error handling
                
                $errors = $result->getErrors();
                //cancelCart();
            
            } elseif ($result->getReturnType() == Result::RETURN_TYPE_REDIRECT) {
                //redirect the user
                header('Location: '.$result->getRedirectUrl());
                die;
                
            } elseif ($result->getReturnType() == Result::RETURN_TYPE_PENDING) {
                //payment is pending, wait for callback to complete
            
                //setCartToPending();
            
            } elseif ($result->getReturnType() == Result::RETURN_TYPE_FINISHED) {
                //payment is finished, update your cart/payment transaction
            
                //finishCart();
            }
        }



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
       /*  if(Auth::user()) {
            return view('profile.index', compact('categories'));
        } else {
            return view('profile.thankyou', compact('categories'));
        } */
      
    }

}
