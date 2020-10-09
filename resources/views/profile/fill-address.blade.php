@extends('layouts.master')

@section('content')
<section id="fill_adress">
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-info"> {{session('msg')}} </div>
        @endif
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-9 mr-0 ml-auto">
                <h4 style="margin-bottom:40px;"> <strong>Personal details</strong></h4>
                <div class="container">
                    <form  id="payment_form"  action="{{ url('createAddress') }}" method="POST"  class='test-form fill-address'>
                        @csrf
                            <div class="shipping-details-form">
                                <div class="row my-4">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="firstname" class="form-label">First Name</label> 
                                    <input id="firstname" type="text" name="firstname" placeholder="e.g. John"  value="{{ old('firstname') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('firstname') }}</p>     
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input id="lastname" type="text" name="lastname" placeholder="e.g. Doe" value="{{ old('lastname') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('lastname') }}</p>
                                </div>
                            </div> 
                            <div class="row my-4">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="email" placeholder="e.g. johndoe@gmai.com" value="{{ old('email') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input id="phone" type="text" name="phone" placeholder="e.g. 068/123-123" value="{{ old('phone') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('email') }}</p>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="street" class="form-label">Street Address</label>
                                    <input id="street" type="text" name="street" placeholder="e.g. Sutter Str 111" value="{{ old('street') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('street') }}</p>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="zip" class="form-label">Zip Code</label>
                                    <input id="zip" type="text" name="zip" placeholder="e.g. 81000" value="{{ old('zip') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('zip') }}</p>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="city" class="form-label">City Name</label>                   
                                    <input id="city" type="text" name="city" placeholder="e.g. Podgorica" value="{{ old('city') }}" class="form-control">
                                    <p style="color:red; margin-top:5px;">{{ $errors->first('city') }}</p>
                                </div>
                            </div>
                            </div>
                            <div style="text-align:center; margin-bottom:50px;" >
                                <input type="submit" value="Save Changes" class="submit-button" style="width: 150px;">
                            </div>                          
                    </form>
                </div>
            </div>       
        </div>
    </div>
</section>
@endsection