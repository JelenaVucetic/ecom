@extends('layouts.master')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">Dashboard</li>
                    <h3>
                        <span style="color:green"> {{ucwords(Auth::user()->name)}} </span>, 
                        Welcome
                    </h3>
                </ol>
            </div>
        </div>
    </section>
@endsection