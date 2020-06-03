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
                    <form  id="payment_form"  action="" method="POST"  class='test-form'>
                        @csrf
                            <div class="shipping-details-form">
                                <div class="">
                                    <label for="firstname" class="form-label">First Name</label> 
                                    <input id="firstname" type="text" name="firstname" placeholder="e.g. John"  value="{{ old('firstname') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('firstname') }}</span>     
                                </div>
                                <div class="">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input id="lastname" type="text" name="lastname" placeholder="e.g. Doe" value="{{ old('lastname') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('lastname') }}</span>
                                </div>
                                <div class="">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" placeholder="e.g. johndoe@gmai.com" value="{{ old('email') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input id="phone" type="text" name="phone" placeholder="e.g. 068/123-123" value="{{ old('phone') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="">
                                    <label for="street" class="form-label">Street Address</label>
                                    <input id="street" type="text" name="street" placeholder="e.g. Sutter Str 111" value="{{ old('street') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street') }}</span>
                                </div>
                                <div class="">
                                    <label for="zip" class="form-label">Zip Code</label>
                                    <input id="zip" type="text" name="zip" placeholder="e.g. 81000" value="{{ old('zip') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('zip') }}</span>
                                </div>
                                <div class="">
                                    <label for="city" class="form-label">City Name</label>                   
                                    <input id="city" type="text" name="city" placeholder="e.g. Podgorica" value="{{ old('city') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('city') }}</span>
                                </div>
                            </div>
                    </form>
                </div>
            </div>       
        </div>
    </div>
</section>
@endsection