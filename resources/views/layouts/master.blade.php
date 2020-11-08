<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>URBANONE</title>
    
        <link rel="icon" type="image/png" href="{!! asset('/site-images/favicon-16x16.png') !!}" sizes="16x16">
        <link rel="icon" type="image/png" href="{!! asset('/site-images/favicon-32x32.png') !!}" sizes="32x32">
        <link rel="icon" type="image/png" href="{!! asset('/site-images/favicon-96x96.png') !!}" sizes="96x96">

        <link rel="apple-touch-icon" href="older-iPhone.png"> 
        <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('/site-images/iPhone-6-Plus.png') !!}">
        <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('/site-images/iPad-Retina.png') !!}">
        <link rel="apple-touch-icon" sizes="167x167" href="{!! asset('/site-images/iPad-Retina.png') !!}">

        <meta property="og:title" content="URBANONE">
        <meta property="og:image" content="https://urbanone.me/site-images/1596110174second.jpg">
        @yield('meta')

     <!-- Example docs (CSS for helping component example file)-->
    <link href="https://propeller.in/docs/css/example-docs.css" type="text/css" rel="stylesheet" />
   
     <!-- Propeller card (CSS for helping component example file) -->
     <link href="https://propeller.in/components/card/css/card.css" type="text/css" rel="stylesheet" /> 
   
     <!-- Propeller typography -->
     <link href="/css/typography.css" type="text/css" rel="stylesheet" />
   
     <!-- Google Icon Font -->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="/css/google-icons.css" type="text/css" rel="stylesheet" />
   
     <!-- Propeller dropdown -->
     <link href="/css/dropdown.css" type="text/css" rel="stylesheet"/>
   
     <!-- Propeller navbar -->
     <link href="/css/navbar.css" type="text/css" rel="stylesheet"/>

     <!-- Icons -->
     <script src="https://kit.fontawesome.com/920ab36000.js" crossorigin="anonymous"></script>
     
     <!-- Propeller button  -->
     <link href="/css/button.css" type="text/css" rel="stylesheet"/>
     
     <!-- Propeller list  -->
     <link href="/css/list.css" type="text/css" rel="stylesheet"/>
   
     <!-- Propeller sidebar  -->
       <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
       
         <!-- sidebar  -->
     <link rel="stylesheet" type="text/css" href="/css/mysidebar.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/5star.css">

       <!--  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
       
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        
         <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
        <script src="/js/jQuery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.4.0/dist/lazyload.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/welcome.css">
        <link rel="stylesheet" href="/css/slick.css">
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/welcome.css">
        <link rel="stylesheet" href="/css/cart.css">
        <link rel="stylesheet" href="/css/productDetails.css">
        <link rel="stylesheet" href="/css/login.css">
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/modal.css">
        <link rel="stylesheet" href="/css/privacyPolicy.css">
        <link rel="stylesheet" href="/css/contact.css">
        <link rel="stylesheet" href="/css/copyright.css">
        <link rel="stylesheet" href="/css/shipping.css">
        <link rel="stylesheet" href="/css/categories.css">
        <link rel="stylesheet" href="/css/profile.css">
        <link rel="stylesheet" href="/css/address.css">
        @yield('cart-about-style.css')
        @yield('changed_header')
        @yield('phone-css')
        @yield('slick.css')
      <link href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" rel="stylesheet"/>


       <!--  Payment script -->
       <script data-main="payment-js" src=" https://asxgw.com/js/integrated/payment.1.2.min.js"></script>
       
       <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">

    </head>
    <body>
    @include('layouts.header') 
    @include('layouts.sidenav') 
    @include('layouts.hero')
    @yield('content')
    @include('layouts.footer')

    </body>
    <script src="/js/slick.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
{{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  --}}

<!-- Bootstrap js -->
{{-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}

<!-- Propeller Global js --> 
<script src="/js/global.js"></script>
	
<!-- Propeller Sidebar js -->
<script type="text/javascript" language="javascript" src="/js/sidebar.js"></script>

<!-- Propeller Dropdown js -->
<script type="text/javascript" language="javascript" src="/js/dropdown.js"></script>
<script src="/js/wavytext.js"></script>
@yield('rateYo')
@yield('recaptcha')
<script src="/js/myJs.js"></script>
</html>
