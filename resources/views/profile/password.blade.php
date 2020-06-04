@extends('layouts.master')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="row">
        @include('profile.menu')
            <div class="col-md-8">
            <h3><span>{{ucwords(Auth::user()->name)}},</span> Update your password</h3>
            <div class="container">
            @if(session('msg'))
                <div class="alert alert-info"> {{session('msg')}} </div>
            @endif

            {!! Form::open(['url' => 'updatePassword', 'method'=> 'post']) !!}
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach 
            
                <div class="shipping-details-form" style="width:60%">
                    <div class="" style="margin:20px 0;">
                        <label for="password" class="form-label" style="margin-bottom:0;">Current Password</label>
                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                    </div>

                    <div class="" style="margin:20px 0;">
                        <label for="password" class="form-label"  style="margin-bottom:0;">New Password</label>
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>

                    <div class="" style="margin:20px 0;">
                        <label for="password" class="form-label"  style="margin-bottom:0;">New Confirm Password</label>
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>

                    <div style="text-align:center; margin-bottom:50px;">
                        <button type="submit" class="submit-button">
                            Update Password
                        </button>
                    </div>
                </div>
            </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection