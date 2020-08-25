@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid shipping">
        <div class="row">
            <div class="col-xs-6 col-sm-3 " id="side">
                <div>
                    <a href="/about">About us</a>
                    <i class="fa fa-angle-right"></i>
                </div>
               <div>
                   <a href="/how_to_order">How to order</a>
                   <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/shipping_and_handling">Shipping & Handling</a>
                    <i class="fa fa-angle-down"></i>
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
                    <h4>How can I change my order?</h4>
                    <p>If you have confirmed your order and have already received an email confirmation, the order can no
                        longer be changed. If you believe that an error has occurred, you have changed your mind or want to
                        replace, remove or add the product to your order, please contact us at buy@urbanone.me and then, if
                        possible, if you notify us in a timely manner, we will initiate the order change process</p>
                </div>
                <div>
                    <h4>Can I change my shipping address after I have already placed my order?</h4>
                    <p>If you have already received the confirmation email via email, you can no longer change the shipping
                        address. We can do this for you, but only if you notify us of this change in a timely manner, or the same
                        day you received the confirmation message. In that case, please contact us at buy@urbanone.me</p>
                </div>
                <div>
                    <h4>What is the shipping method?</h4>
                    <p>Delivery is at the address you provided in the purchase order by courier or post.</p>
                </div>
                <div>
                    <h4>What is the shipping cost?</h4>
                    <p>Shipping costs are 2.5e for all cities of Montenegro. <br>
                        If the total number of your order exceeds 35e delivery is free.</p>
                </div>
                <div>
                    <h4>What is the average delivery time?</h4>
                    <p>For example, if you order product delivery to your home address and: <br>
                        you have already paid for the order, but at the time of delivery you are not at home, the carrier is
                        obliged to inform the sender of the inability to deliver the shipment, in which case the sender is obliged
                        to give the carrier additional instructions. <br>
                        In case the buyer does not pick up the goods within the agreed time, and wants delivery again, the
                        buyer will be charged double shipping costs.</p>
                </div>
                <div>
                    <h4>What does it mean if the product is out of stock?</h4>
                    <p>This means that the product is currently unavailable. If the product cannot be delivered, the product will
                        be withdrawn from the online store offer. If you are interested in buying a product that is out of stock,
                        please contact us and we will check your delivery options or we can recommend a similar product that
                        may be right for you.</p>
                </div>

            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection