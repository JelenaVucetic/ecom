@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-xs-6 col-sm-3 " id="copy-side">
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
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/help_center">Help center</a>
                    <i class="fa fa-angle-right"></i>
               </div>
               <div>
                    <a href="/copyright">Copyright</a>
                    <i class="fa fa-angle-down"></i>
               </div>
               <div>
                    <a href="/contact_us">Contact us</a>
                    <i class="fa fa-angle-right"></i>
               </div>
            </div>
            <div class="col-xs-6 col-sm-9 copy-right">
                <h4>Copyright</h4>
                <p> <strong>The Urban One team is built primarily on the appreciation and recognition of artists.</strong>  <br>
                    Absolutely all copyrights on this site are retained by Urban One under the company Monargo Ltd. and, if
                    they are used for any purpose by a third party who is not authorized, we will refer to the Law on
                    Copyright and Related Rights. The Law is published in „the Official Gazette of Montenegro“, no. 37/2011
                    and 53/2016 by which we are protected, so the further case be the subject of the Commercial Court.</p>
               
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection