@extends('layouts.master')
@section('changed_header')
<link rel="stylesheet" href="/css/changed_header.css">
@endsection
@section('content')
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-xs-6 col-sm-3 " id="copy-side">
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
                <p>Urban One tim je izrgradjen prvenstveno na postovanju i priznanju umjetnika. <br>
                    Apsolutno sva autorska prava na ovome sajtu zadrzava Urban One pod drustvom Monargo doo i ukoliko ista budu koristena u bilo koje svrhe od treceg lica koje nema ovlascene pozvacemo se na Zakon o autorskom i srodnim pravima Zakon je objavljen u "Službenom listu CG", br. 37/2011 i 53/2016. Kojim smo zasticeni cime ce dalji slucaj biti predmet Privrednog Suda.</p>
               
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection