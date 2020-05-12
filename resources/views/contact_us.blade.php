@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid contact">
        <div class="row">
            <div class="col-xs-6 col-sm-3" id="side">
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
                    <i class="fa fa-angle-down"></i>
               </div>
            </div>
            <div class="col-xs-6 col-sm-9 contact-form">
                <h4>You can contact us by sending an email to buy@urbanone.me</h4>
               <form action="">
                   @csrf
                    <div>
                        <label for="email">Your email address <span style="color:#E6003A">*</span></label>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <label for="subject">Subject<span style="color:#E6003A"> *</span></label>
                        <input type="text" name="subject" required>
                    </div>
                    <div>
                        <label for="description">Description<span style="color:#E6003A"> *</span></label>
                        <textarea name="description" required></textarea>
                        <p>Please use this text box above to tell us a little bit more about your query.</p>
                    </div>
                    <div >
                        <label for="file">Attach a photo<span style="color:#E6003A"> *</span></label>
                        <input type="file" class="custom-input">
                        <p>If you have a photo or image that will help our investigation, please add it here.</p>
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
  
    <div class="subscribe-bottom">
        <div>
            <p>EUR - English</p>
            <p>Mature content: Visible</p>
        </div>
    </div>
@endsection