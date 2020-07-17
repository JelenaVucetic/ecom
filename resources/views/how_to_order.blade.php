@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid shipping">
        <div class="row">
            <div class="col-xs-6 col-sm-3 " id="side">
               <div>
                   <a href="/how_to_order">How to order</a>
                   <i class="fa fa-angle-down"></i>
               </div>
               <div>
                    <a href="/shipping_and_handling">Shipping & Handling</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/help_center">Help center</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/copyright">Copyright</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/contact_us">Contact us</a>
                    <i class="fa fa-angle-right"></i>
               </div>
            </div>
            <div class="col-xs-6 col-sm-9 shipping-right">
                <div>
                    <h4>How can you order a product?</h4>
                    <p>You select a product, design, color and size and then by clicking on it you add it to your cart. Clicking on
                        the shopping cart or your online store profile icon will take you to the order preview page. There you
                        can change the quantity, delete the product or if you wish you can add a new one by returning to the
                        desired heading. When you have finished selecting the product, when viewing the basket, press the
                        button for the next step and select the shipping and payment method and fill out all the required fields.
                        After you have entered all the information, click the button to confirm your order. In a few minutes you
                        will receive an email reviewing the order at the email address you provided when registering.</p>
                </div>
                <div>
                    <h4>Do I need to register to shop at Urban One?</h4>
                    <p>It&#39;s not necessary to register to purchase. You can also purchase as an unregistered user, but you will
                        need to enter some required information to submit and confirm your order.
                        Despite this option, we recommend that you sign up for a purchase. This will create your profile where
                        your order history will be available to you, a list of desired products that you can buy in the future, plus
                        you can sign up for information on activities and benefits.</p>
                </div>
                <div>
                    <h4>How to cancel an order?</h4>
                   <p>If you have confirmed your order and have already received an email confirmation, you can only cancel
                    your order until the end of the same day of the order at buy@urbanone.me</p>
                </div>
                <div>
                    <h4>How can I know if my order has been confirmed?</h4>
                    <p>After you confirm your order, please check the email you entered when ordering the product as you will
                        receive a confirmation message at the entered address. If you do not receive the message, we
                        recommend checking the &quot;Spam&quot; section. Due to different network or computer settings, your order
                        may be confirmed there. If you cannot find the confirmation message in this section, please contact us
                        by email at buy@urbanone.me. <br>
                        If you have registered at an online store, you can easily view your orders on the profile you created.</p>
                </div>
                <div>
                    <h4>Can I order products through the company or as a company?</h4>
                    <p>Yes, you can easily order products through the company or as a company (legal entity). In the ordering
                        process, be sure to enter your business information in the information field, and in the next step, select
                        your payment method. In the case of a purchase on behalf of the company, you are obliged, as an
                        authorized person, to make the correct data on behalf of the company as a guarantee of their accuracy.</p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection