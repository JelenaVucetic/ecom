@extends('layouts.master')

@section('content')
<section id="cart_items" style="padding:200px;">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}">Profile</a></li>
                <li class="active">My Address</li>
            </ol>
        </div>
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
                <h3><span style="color:green">{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>
                <div class="container">

                </div>
            </div>       
        </div>
    </div>
</section>
@endsection