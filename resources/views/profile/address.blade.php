@extends('layouts.master')

@section('content')
<section id="cart_items">
    <div class="container">
        @if(session('msg'))
        <div class="alert alert-info"> {{session('msg')}} </div>
        @endif
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
            <h4 style="margin-bottom:40px;"> <strong> {{ucwords(Auth::user()->name)}}</strong>, your infromation.</h4>
                <div class="container">
                    <form action="{{ url('updateAddress') }}" method="POST"  class='test-form'>
                    @csrf
                    <div class="shipping-details-form address">
                        <div class="">
                            <label for="firstname" class="form-label">First Name</label> 
                            <input id="firstname" type="text" name="firstname" placeholder="e.g. John"  value="{{ $address_data->firstname }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('firstname') }}</span>     
                        </div>
                        <div class="">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input id="lastname" type="text" name="lastname" placeholder="e.g. Doe" value="{{ $address_data->lastname }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('lastname') }}</span>
                        </div>
                        <div class="">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" placeholder="e.g. johndoe@gmai.com"  value="{{ $address_data->email }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="">
                            <label for="phone" class="form-label">Phone</label>
                            <input id="phone" type="text" name="phone" placeholder="e.g. 068/123-123" value="{{ $address_data->phone }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="">
                            <label for="street" class="form-label">Street Address</label>
                            <input id="street" type="text" name="street" placeholder="e.g. Sutter Str 111" value="{{ $address_data->street }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('street') }}</span>
                        </div>
                        <div class="">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input id="zip" type="text" name="zip" placeholder="e.g. 81000"  value="{{ $address_data->zip }}" class="form-control">
                            <br>
                            <span style="color:red">{{ $errors->first('zip') }}</span>
                        </div>
                        <div class="">
                            <label for="city" class="form-label">City Name</label>                   
                            <select class="select_city" id="" name="city" >
                                <option value={{ $address_data->city }}>{{ $address_data->city }}</option>
                                <option value="Andrijevica" {{ (isset($ads->city)) == "Andrijevica" ? selected : "" }}>Andrijevica</option>
                                <option value="Bar" {{ (isset($ads->city)) == "Bar" ? selected : "" }}>Bar</option>
                                <option value="Berane" {{ (isset($ads->city)) == "Berane" ? selected : "" }}>Berane</option>
                                <option value="Budva" {{ (isset($ads->city)) == "Budva" ? selected : "" }}>Budva</option>
                                <option value="Bijelo Polje" {{ (isset($ads->city)) == "Bijelo Polje" ? selected : "" }}>Bijelo Polje</option>
                                <option value="Cetinje" {{ (isset($ads->city)) == "Cetinje" ? selected : "" }}>Cetinje</option>
                                <option value="Danilovgrad" {{ (isset($ads->city)) == "Danilovgrad" ? selected : "" }}>Danilovgrad</option>
                                <option value="Gusinje" {{ (isset($ads->city)) == "Gusinje" ? selected : "" }}>Gusinje</option>
                                <option value="Herceg Novi" {{ (isset($ads->city)) == "Herceg Novi" ? selected : "" }}>Herceg Novi</option>
                                <option value="Podgorica" {{ (isset($ads->city)) == "Podgorica" ? selected : "" }}>Podgorica</option>
                                <option value="Petnjica" {{ (isset($ads->city)) == "Petnjica" ? selected : "" }}>Petnjica</option>
                                <option value="Plav" {{ (isset($ads->city)) == "Plav" ? selected : "" }}>Plav</option>
                                <option value="Pljevlja" {{ (isset($ads->city)) == "Pljevlja" ? selected : "" }}>Pljevlja</option>
                                <option value="Plužine" {{ (isset($ads->city)) == "Plužine" ? selected : "" }}>Plužine</option>
                                <option value="Rožaje" {{ (isset($ads->city)) == "Rožaje" ? selected : "" }}>Rožaje</option>
                                <option value="Kolašin" {{ (isset($ads->city)) == "Kolašin" ? selected : "" }}>Kolašin</option>
                                <option value="Kotor" {{ (isset($ads->city)) == "Kotor" ? selected : "" }}>Kotor</option>                           
                                <option value="Mojkovac" {{ (isset($ads->city)) == "Mojkovac" ? selected : "" }}>Mojkovac</option>
                                <option value="Nikšić" {{ (isset($ads->city)) == "Nikšić" ? selected : "" }}>Nikšić</option>
                                <option value="Ulcinj" {{ (isset($ads->city)) == "Ulcinj" ? selected : "" }}>Ulcinj</option>                         
                                <option value="Tivat" {{ (isset($ads->city)) == "Tivat" ? selected : "" }}>Tivat</option>
                                <option value="Šavnik" {{ (isset($ads->city)) == "Šavnik" ? selected : "" }}>Šavnik</option>
                                <option value="Žabljak" {{ (isset($ads->city)) == "Žabljak" ? selected : "" }}>Žabljak</option>
                            </select>
                            <br>
                            <span style="color:red">{{ $errors->first('city') }}</span>
                        </div>
                    </div>
                    <div class="address-btn">
                        <input type="submit" value="Submit" class="submit-button" style="width: 150px;">
                    </div>      
                </form>
             </div>
            </div>       
        </div>
    </div>
</section>
@endsection