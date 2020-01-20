@extends('layouts.master')
@section('content')
<section id="cart_items" style="padding:200px">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}">Profile</a></li>
                <li class="active">Update Password</li>
            </ol>
        </div>
        <div class="row">
        @include('profile.menu')
            <div class="col-md-8">
                <h3><span>{{ucwords(Auth::user()->name)}}</span> Update your password</h3>
                <div class="container">
                {!! Form::open(['url' => 'updatePassword', 'method'=> 'post']) !!}
                   
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection