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
use Laravie\Parser\Xml\Reader;
use Laravie\Parser\Xml\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderNotification;
class CheckoutController extends Controller
{

    public function payment_info() {
        $categories = Category::where('parent_id',NULL)->get();
        $payment = DB::table('payment_info')->orderBy('id', 'DESC')->first();

        Cart::destroy();
        Notification::route('mail', $payment->email)->notify(new OrderNotification($payment));
        // Mail::to($payment->email)->send(new OrderShipped('Uspješno', $payment->transaction_id, $payment->amount, $payment->extra_data,$payment->card_type, $payment->last_four_digits));

        return view('payment_info', compact('categories', 'payment'));
    }

    public function cancel() {
        $categories = Category::where('parent_id',NULL)->get();
        return view('cancel', compact('categories'));
    }

    public function callback() {
        $categories = Category::where('parent_id',NULL)->get();
        
        //require_once(base_path() . '/vendor/allsecure-pay/php-exchange/initClientAutoload.php');

        $client = new Client("urbanone.me", "ATk9krlxg5yyF?gYyR(§8X&Oh)Ui8", "urbanone-hb01", "IkzkNSWoNztn2cq2HAPHauBK6FBviq");

        $client->validateCallbackWithGlobals();
      
        $callbackResult = $client->readCallback(file_get_contents('php://input'));
        
        $myTransactionId = $callbackResult->getTransactionId();
        $gatewayTransactionId = $callbackResult->getReferenceId(); 
        
        $xml = simplexml_load_file('php://input');
        $card_type = (string) $xml->returnData->creditcardData->type;
        $card_holder = (string) $xml->returnData->creditcardData->cardHolder;
        $expiry_month = (string) $xml->returnData->creditcardData->expiryMonth;
        $expiry_year = (string) $xml->returnData->creditcardData->expiryYear;
        $first_six_digits = (string) $xml->returnData->creditcardData->firstSixDigits;
        $last_four_digits = (string) $xml->returnData->creditcardData->lastFourDigits;
        $email = (string) $xml->customerData->email;
 
        $status = $callbackResult->getResult();
        $order_number = $callbackResult->getReferenceId();
        $amount = $callbackResult->getAmount();
        
file_put_contents('/var/www/vhosts/urbanone.me/httpdocs/urbanone/resources/views/test.xml', file_get_contents('php://input') , FILE_APPEND );

        if ($callbackResult->getResult() == 'OK') {
	
            $test= DB::table('payment_info')->insert([
                    'result' => $callbackResult->getResult(),
                    'reference_id' => $callbackResult->getReferenceId(),
                    'transaction_id' =>  $callbackResult->getTransactionId(),
                    'purchase_id' => $callbackResult->getPurchaseId(),
                    'transaction_type'  => $callbackResult->getTransactionType(),
                    'payment_method' => $callbackResult->getPaymentMethod(),
                    'amount' => $callbackResult->getAmount(),
                    'currency' => $callbackResult->getCurrency(),
                    'extra_data' => 'XXXXXX',
                    'message' => 'dummy',
                    'code' =>'dummy',
                    'email' => $email,
                    'card_type' => $card_type,
                    'card_holder' =>  $card_holder,
                    'expiry_month' =>  $expiry_month,
                    'expiry_year' => $expiry_year,
                    'first_six_digits' => $first_six_digits,
                    'last_four_digits' => $last_four_digits
                ]);
          
            //Order Success Mail    

            return response('OK', 200)
                  ->header('Content-Type', 'text/plain');  

        } elseif ($callbackResult->getResult() == 'ERROR') {
            //payment failed, handle errors
             file_put_contents('/var/www/vhosts/urbanone.me/httpdocs/urbanone/resources/views/test.xml', 'error' , FILE_APPEND );
            $message = (string) $xml->errors->error->message;
            $code = (string) $xml->errors->error->code;
            
            DB::table('payment_info')->insert([
                'result' => $callbackResult->getResult(),
                'reference_id' => $callbackResult->getReferenceId(),
                'transaction_id' =>  $callbackResult->getTransactionId(),
                'purchase_id' => $callbackResult->getPurchaseId(),
                'transaction_type'  => $callbackResult->getTransactionType(),
                'payment_method' => $callbackResult->getPaymentMethod(),
                'amount' => $callbackResult->getAmount(),
                'currency' => $callbackResult->getCurrency(),
				'extra_data' => 'XXXXXX',
                'message' =>  $message,
                'code' => $code,
                'email' => $email,
                'card_type' => $card_type,
                'card_holder' =>  $card_holder,
                'expiry_month' =>  $expiry_month,
                'expiry_year' => $expiry_year,
                'first_six_digits' => $first_six_digits,
                'last_four_digits' => $last_four_digits
            ]);
            
            //Order error mail

            return response('OK', 200)
            ->header('Content-Type', 'text/plain');   
        } else {
            echo "OK";
        }
             
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
       // require_once(base_path() . '/vendor/allsecure-pay/php-exchange/initClientAutoload.php');
        // Instantiate the "Exchange\Client\Client" with your credentials
         $client = new Client("urbanone.me", "ATk9krlxg5yyF?gYyR(§8X&Oh)Ui8", "urbanone-hb01", "IkzkNSWoNztn2cq2HAPHauBK6FBviq");

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
            ->setSuccessUrl('https://urbanone.me/payment_info')
            ->setCancelUrl('https://urbanone.me/cancel')
            ->setErrorUrl('https://urbanone.me/payment_info')
            ->setCallbackUrl('https://urbanone.me/callback')
            ->setAmount($request->amount)
            ->setCurrency('EUR')
            ->setCustomer($customer);

        //if token acquired via payment.js
        if (isset($token)) {
        $debit->setTransactionToken($token);
        }

        // send the transaction
        $result = $client->debit($debit);


        $statusRequestData = new StatusRequestData();
        $statusRequestData->setMerchantTransactionId($merchantTransactionId);
        $statusResult = $client->sendStatusRequest($statusRequestData);
        
        if ($result->isSuccess()) {
            //act depending on $result->getReturnType()
            $gatewayReferenceId = $result->getReferenceId(); //store it in your database
      
                if (Auth::check()) {
                    $userid = Auth::user()->id;
                } else {
                    $userid = '0';
                }
                
                $id_order = Order::createOrder($request->order_number);
                
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
        } else {
            $categories = Category::where('parent_id',NULL)->get();
            $errorData = $statusResult->getFirstError();
            $code = $errorData->getCode();

            return view('error_payment_info', compact('categories', 'code'));
        }          
      
      
       /*  if(Auth::user()) {
            return view('profile.index', compact('categories'));
        } else {
            return view('profile.thankyou', compact('categories'));
        } */
      
    }

}
