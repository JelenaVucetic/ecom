@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid shipping">
        <div class="row">
            <div class="col-xs-6 col-sm-3 about " id="side">
                <div>
                    <a href="/about">About us</a>
                    <i class="fa fa-angle-down"></i>
                </div>
               <div>
                   <a href="/how_to_order">How to order</a>
                   <i class="fa fa-angle-right"></i>
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
                    <h4>About us</h4>
                    <p>We want to simplify your life. Customaze it.
                        Make it
                        Urban
                        We want to enhance your unique and personal st
                        yle with our designs
                        that are in constant renovation
                        .
                        Thus, we respect the essence of Mediterranean style
                        and taste
                        that characterizes us, adding the
                        necessary touch to keep us on the vanguard.
                        We are online creators of your style. <br>
                        We
                        will offer you ideas to make
                        your choices easily
                        and ensure that through secure shopping you can
                        find the latest, fun and unique gifts for yourself and others through the easiest and fastest way.
                    </p>
                </div>
                <div>
                    <h4>Our informations</h4>
                    <p>Monargo doo – Urban One <br>
                        PIB 03083748 <br>
                        Djoka Mirasevica M3 ( Ruske Kule ) Podgorica 81000
                    </p>
                </div>
                
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection