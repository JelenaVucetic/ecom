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
                    <i class="fa fa-angle-down"></i>       
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
            <div class="col-xs-6 col-sm-9 copy-right">
                <h4>What does it mean when my product is "Out of stock"?</h4>
                <p>To znači da je proizvod trenutno nedostupan. Ako se proizvod ne može isporučiti, proizvod će se povući iz ponude online prodavnice. Ako ste zainteresovani za kupovinu proizvoda koji nije na zalihama, kontaktirajte nas i proverićemo za vas mogućnosti isporuke ili vam možemo preporučiti sličan proizvod koji bi vam možda mogao odgovarati. </p>
            </div>
        </div>
    </div>
    @include('layouts.subscribe')
@endsection