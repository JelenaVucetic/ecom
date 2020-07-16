@extends('layouts.master')

@section('content')
<?php
$error_messages = array(
	'1000' => 'Some fundamental error in your request.',
	'1001' => 'The upstream system responded with an unknown response.',
	'1002' => 'Request data are malformed or missing.',
	'1003' => 'Transaction could not be processed.',
	'1004' => 'The request signature you provided was wrong.',
	'1005' => 'The XML you provided was malformed or invalid.',
	'1006' => 'Preconditions failed, e.g. capture on a failed authorize..',
	'1007' => 'Something is wrong your configuration, please contact your integration engineer.',
	'1008' => 'Unexpected system error.',
	'9999' => 'We received an error which is not (yet) mapped to a better error code.',
	'2001' => 'The card you entered cannot be accepted. Please try another card.',
	'2002' => 'Transaction was cancelled by customer.',
	'2003' => 'Transaction declined by upstream system/bank. Please try again or change your card.',
	'2004' => 'The card you entered has exceeded the limit. Please select another card.',
	'2005' => 'The user did not complete the transaction within the scheduled time.',
	'2006' => 'The card you entered has exceeded the limit. Please select another card.',
    '2007' => 'The payment card information you entered is incorrect. Please check the information and try again.',
	'2008' => 'The card you entered cannot be accepted. Please try another card.',
	'2009' => 'The card you entered has expired. Please select another card.',
	'2010' => 'Your transaction was not approved. Please select another card or check with the bank.',
	'2011' => 'The card you entered cannot be accepted. Please try another card.',
	'2012' => 'Transaction canceled.',
	'2013' => 'Your transaction was not approved. Please select another card or check with the bank.',
	'2014' => 'Your transaction was not approved. Please select another card or check with the bank.',
	'2015' => 'Your transaction was not approved. Please select another card or check with the bank.',
	'2016' => 'Your transaction was not approved. Please select another card or check with the bank.',
	'2017' => 'IBAN is not valid. Please check the information and try again.',
	'2018' => 'BICis not valid. Please check the information and try again.',
	'2019' => 'User information is invalid. Please check the information and try again.',
	'2020' => 'CVV code is required. Please check the information and try again.',
	'2021' => 'Your 3D Secure authentication failed. Please call the bank that issued your card or use a card other than 3D-Secure.',
	'3001' => 'COMMUNICATION: The transaction has expired. Take a break and try again later.',
	'3002' => 'COMMUNICATION: No transaction allowed.',
	'3003' => 'COMMUNICATION: The system is temporarily unavailable. Take a break and try again later.',
	'3004' => 'Transaction ID has already been used.',
	'3005' => 'The transaction was not approved due to problems communicating with the bank. Please try again later.',
	'7001' => 'Transaction planning request is invalid.',
	'7002' => 'Transaction planning request was not accepted.',
	'7005' => 'The planned transaction is invalid.',
	'7010' => 'RegistrationId is necessary.',
	'7020' => 'RegistrationId is invalid.',
	'7030' => 'RegistrationId does not have a corresponding reference.',
	'7035' => 'The initial transaction to initiate scheduled recurring payments must be "register", "debit + register" or "preuth + register".',
	'7036' => 'The period between the initial and the next transaction must be longer than 24 hours.',
	'7040' => 'ScheduleId (Scheduled Transaction Id) is invalid or not linked to this payment channel.',
	'7050' => 'Planned initial transaction (startDateTime) is not a valid format or is older than 24 hours.',
	'7060' => 'The scheduled continueDateTime transaction is not a valid format or is older than 24 hours.',
	'7070' => 'The planned transaction status is not a valid format for the requested operation.'
);
?>
    <section id="cart_items">
        <div class="container" style="margin: 50px 0;">
            <h3>
            @if (Auth::check()) 
                <span style="color:green"> {{ucwords(Auth::user()->name)}} </span>, 
                Welcome
            @else
                Your payment informations
            @endif
            </h3>
        <div>
            <p><strong>Status:</strong> Error </p>
			@foreach ($error_messages as $item => $value)
			
                @if ($item == $code )
                <p>{{$value}}</p>
                @endif
            @endforeach
        </div>
        
        </div>
    </section>
@endsection