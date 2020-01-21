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
        @if(session('msg'))
        <div class="alert alert-info"> {{session('msg')}} </div>
        @endif
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
                <h3><span style="color:green">{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>
                <div class="container">
                    {!! Form::open(['url' => 'updateAddress', 'method'=> 'post']) !!}
                    @foreach($address_data as $value)
                   <div class="form-group col-md-6">
                        <label for="firstname" class="form-label">First Name</label> 
                        <input id="firstname" type="text" name="firstname" placeholder="First Name"  value="{{ $value->firstname }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('firstname') }}</span>     
                         
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Last Name" value="{{ $value->lastname }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('lastname') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" placeholder="Email" value="{{ $value->email }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="street" class="form-label">Street Address</label>
                        <input id="street" type="text" name="street" placeholder="Street Address" value="{{ $value->street }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('street') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zip" class="form-label">Zip Code</label>
                        <input id="zip" type="text" name="zip" placeholder="Zip Code" value="{{ $value->zip }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('zip') }}</span>
                    </div>
                        <div class="form-group col-md-6">
                        <label for="city" class="form-label">City Name</label>                   
                        <input id="city" type="text" name="city" placeholder="City Name" value="{{ $value->city }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('city') }}</span>
                    </div>
                    <input type="submit" value="Update" class="btn btn-primary">
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>       
        </div>
    </div>
</section>
@endsection