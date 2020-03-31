@extends('layouts.master')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <h3>
                    @if (Auth::check()) 
                        <span style="color:green"> {{ucwords(Auth::user()->name)}} </span>, 
                        Welcome
                    @else
                        Thank you for your shopping
                    @endif
                    </h3>
                </ol>
            </div>
        </div>
    </section>
@endsection