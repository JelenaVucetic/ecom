<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

	
     <!-- Bootstrap --> 
   {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet" />   --}}
     
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
       
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

         <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
        <script src="/js/jQuery.js"></script>
        <script src="/js/myJs.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <link rel="stylesheet" href="/css/header.css">
        <link rel="stylesheet" href="/css/welcome.css">
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/cart.css">
        <link rel="stylesheet" href="/css/productDetails.css">
        <link rel="stylesheet" href="/css/footer.css">

       <!--  Payment script -->
       <script data-main="payment-js" src="https://asxgw.paymentsandbox.cloud/js/integrated/payment.1.2.min.js"></script>
       
    </head>
    <body>
    @include('layouts.header') 
    @include('layouts.sidenav') 
    @include('layouts.hero')
    @yield('content')
    @include('layouts.subscribe')
    @include('layouts.footer')

    </body>
    <script src="/js/slick.js"></script>
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
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
  
</html>
