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
                   <div class="container">
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">Current password</label>
                                <input type="text" class="form-control" name="oldPassword">
                                <span style="color:red;">{{ $errors->first('oldPassword') }}</span>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="example-text-input">New password</label>
                                <input type="text" class="form-control" name="newPassword">
                                <span style="color:red;">{{ $errors->first('newPassword') }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" value="Update" class="btn btn-primary">
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