@extends('layouts.master')

@section('cart-about-style.css')
    <link rel="stylesheet" href="/css/cart-about.css">
@endsection

@section('content')
@include('modals.terms')

<script>
$(document).ready(function(){
for( let i=1;i<200;i++) {
    $('#upCart'+i).on('change keyup', function(){
        var city = $('.cart_select select').find(":selected").val();
        var newqty = $('#upCart'+i).val();
        var rowId = $('#rowId'+i).val();
        var proId = $('#proId'+i).val();
        if(newqty <=0)
        {
            alert('enter only valid quantity')
        } else {
        $.ajax({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type: 'get',
            dataType: 'json',
            url: '/cart/updateCart/'+proId,
            data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId +  "& city=" + city,
            success: function (data) {
                $('#upCart'+i).html(data.qty);
                $('#subtotal'+i).html('&euro;'+data.subtotal);
                $('#cartTotal').html('&euro;'+data.cartTotal);
                $('#cartTotal1').html('&euro;'+data.cartTotal);
                $('#oldPrice').html('&euro;'+data.oldPrice);
                $('#countTotal').html('&euro;'+data.countTotal);
                $('#cartTotalSecond').html('&euro;'+data.cartTotal);
                $('#cartTotal1Second').html('&euro;'+data.cartSubTotalOld);
                $('#countTotalSecond').html('&euro;'+data.countTotal);
                //$('#strong_shipping').html(date.shipping)
                $('#amount').val(data.cartTotal);
                $("#number_cart_items").html(data.cartCount); 
            }
        });

        }
        });
   };
});
</script>
<script>
    $(document).ready(function(){
    for( let i=1;i<200;i++) {
        $('#upCartPhone'+i).on('change keyup', function(){
            var city = $('.cart_select select').find(":selected").val();
            var newqty = $('#upCartPhone'+i).val();
            var rowId = $('#rowIdPhone'+i).val();
            var proId = $('#proIdPhone'+i).val();
            if(newqty <=0)
            {
                alert('enter only valid quantity')
            } else {
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type: 'get',
                dataType: 'json',
                url: '/cart/updateCart/'+proId,
                data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId + "& city=" + city,
                success: function (data) {
                    $('#upCartPhone'+i).html(data.qty);
                    $('#subtotalPhone'+i).html(data.subtotal);
                    $('#cartTotal').html('&euro;'+data.cartTotal);
                    $('#cartTotal1').html('&euro;'+data.cartTotal);
                    $('#oldPrice').html('&euro;'+data.oldPrice);
                    $('#countTotal').html('&euro;'+data.countTotal);
                    $('#cartTotalSecond').html('&euro;'+data.cartTotal);
                    $('#cartTotal1Second').html('&euro;'+data.cartSubTotalOld);
                    $('#countTotalSecond').html('&euro;'+data.countTotal);
                    $('#amount').val(data.cartTotal);
                    $("#number_cart_items_phone").html(data.cartCount); 
                }
            });
    
            }
            });
       };
    });
</script>

@if($cartItems->isEmpty()) 
<section id="cart_items">
    <div class="container">
        <div class="empty-cart-title">
            <h5>Your shopping cart is empty</h5>    
        </div>
        <div class="empty-cart-description">
            <p>You have no items in your cart and it's hurting your cart's feelings.</p>
            <img src="{{asset('/site-images/2 ikonica - shopping cart.png')}}"/>
        </div>
    </div>
</section>
@else 
<section id="cart_items">
    <div class="container">
        <div style="text-align:center">
            <h2>Your shopping cart</h2>
            <p>Order <strong>three</strong> products and get 10% off</p>
            <p>Order <strong>five</strong> products and get 15% off</p>
        </div>


       {{-- Phone --}}  
        
       <div id="updateDivPhone">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        <div class="" style=" border-top:1px solid gray; border-bottom: 1px solid gray;">
    
         <?php $var =1;?>
            @foreach($cartItems as $cartItem)
            <div class="row-product" style="margin: 30px 0;">
                <div style="width:100px; overflow:hidden">
                    @if($cartItem->options->cat == 'T-Shirts')
                    <div class="cart-img-shirt">
                       <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                   </div>
                   @elseif($cartItem->options->cat == 'Mugs')
                   <div class="cart-img-mug">
                       <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                   </div>
                   @elseif($cartItem->options->cat == 'Samsung Cases' || $cartItem->options->cat == 'Iphone Cases' || $cartItem->options->cat == 'Huawei Cases' || $cartItem->options->cat == 'Custom')
                   <div class="cart-img-case">
                       <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                   </div>
                   @else
                   <div class="cart-img-case">
                       <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                   </div>
                   @endif
                </div>
                    <div>
                        <a href="{{url('/product_details')}}/{{$cartItem->id}}">{{$cartItem->name}}</a> <br>
                        @if($cartItem->options->size !== null)          
                            <span>{{$cartItem->options->size}}</span>
                             @endif
                             @if($cartItem->options->kidssize !== null) 
                             <span>{{ $cartItem->options->kidssize}}</span>
                            @endif
                            @if($cartItem->options->posterSize !== null) 
                            <span>{{ $cartItem->options->posterSize}}</span>
                              @endif
                              @if($cartItem->options->pictureSize !== null) 
                            <span>{{ $cartItem->options->pictureSize}}</span>
                              @endif
                            @if($cartItem->options->customSize !== null && $cartItem->options->customSize !== 'undefinedxundefined' && $cartItem->options->customSize !== 'x') 
                              <span>,{{ $cartItem->options->customSize}}</span>
                            @endif
                            @if($cartItem->options->kidscolor !== null)         
                            <span>, {{ $cartItem->options->kidscolor}}</span>
                            @endif
                             @if($cartItem->options->color !== null)         
                            <span>, {{ $cartItem->options->color}}</span>
                            @endif
                              @if($cartItem->options->print !== null) 
                            <span>, {{ $cartItem->options->print}}</span>
                              @endif
                              @if($cartItem->options->phoneModel !== null) 
                            <span>{{ $cartItem->options->phoneModel}}</span>
                              @endif
                              @if($cartItem->options->caseStyle !== null) 
                            <span>{{ $cartItem->options->caseStyle}}</span>
                            @endif
                              @if($cartItem->options->customCase !== null) 
                            <span>{{ $cartItem->options->customCase}}</span>
                            @endif
                              @if($cartItem->options->coasterShape !== null) 
                              <span>{{ $cartItem->options->coasterShape}},</span>
                            @endif
                            @if($cartItem->options->coasterDesign !== null) 
                            <span>{{ $cartItem->options->coasterDesign}}</span>
                            @endif
                       
                        <input type="hidden" id="rowIdPhone<?php echo $var;?>" value="{{$cartItem->rowId}}"/>
                        <input type="hidden" id="proIdPhone<?php echo $var;?>" value="{{$cartItem->id}}"/>
                        <div class="quantity">
                            <input value="{{$cartItem->qty}}" name="qty" id="upCartPhone<?php echo $var;?>" type="number" min="1" max="100" step="1" value="1">
                        </div> <br>
                        <div class="cart_total" style="margin-top: 30px;">
                            <p class="cart_total-price" id="subtotalPhone<?php echo $var;?>">{{ $cartItem->subtotal }}&euro;</p>
                        </div>
                   
                    </div>
                    <div class="cart_delete">
                        <button><a href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}">x</a></button>
                    </div>
                    <?php $var++;?>
                </div>
            @endforeach
           
        </div>
        </div>

       {{--  End phone  --}}

      <div id="updateDiv">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        <div class="table-responsive-md cart_info">
        <table class="">
            <thead>
                <tr class="cart-header">
                    <td class="image" scope="col" >ITEM</td>
                    <td class="description" scope="col"></td>
                    <td class="price" scope="col">PRICE</td>
                    <td class="quantity" scope="col">QTY</td>
                    <td class="total" scope="col">TOTAL</td>
                    <td></td>
                </tr>
            </thead>
         <?php $count =1;?>
            @foreach($cartItems as $cartItem)
                <tbody>
                    <tr scope="row">
                        <td class="cart_product">
                        @if($cartItem->options->cat == 'T-Shirts')
                         <div class="cart-img-shirt">
                            <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                        </div>
                        @elseif($cartItem->options->cat == 'Mugs')
                        <div class="cart-img-mug">
                            <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                        </div>
                        @elseif($cartItem->options->cat == 'Samsung Cases' || $cartItem->options->cat == 'Iphone Cases' || $cartItem->options->cat == 'Huawei Cases' || $cartItem->options->cat == 'Custom')
                        <div class="cart-img-case">
                            <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                        </div>
                        @else
                        <div class="cart-img-case">
                            <img src="{{url('image',$cartItem->options->img)}}" class="card-img-top bmw">
                        </div>
                        @endif
                        </td>
                        <td class="cart_description">
                            <a href="{{url('/product_details')}}/{{$cartItem->id}}">{{$cartItem->name}}</a> <br>
                             @if($cartItem->options->size !== null)          
                            <span>{{$cartItem->options->size}}</span> <br>
                             @endif
                             @if($cartItem->options->kidssize !== null) 
                             <span>{{ $cartItem->options->kidssize}}</span> <br>
                            @endif
                            @if($cartItem->options->posterSize !== null) 
                            <span>{{ $cartItem->options->posterSize}}</span> <br>
                              @endif
                              @if($cartItem->options->pictureSize !== null) 
                            <span>{{ $cartItem->options->pictureSize}}</span><br>
                              @endif
                            @if($cartItem->options->customSize !== null && $cartItem->options->customSize !== 'undefinedxundefined' && $cartItem->options->customSize !== 'x') 
                              <span>{{ $cartItem->options->customSize}}</span><br>
                            @endif
                            @if($cartItem->options->kidscolor !== null)         
                            <span>{{ $cartItem->options->kidscolor}}</span><br>
                            @endif
                             @if($cartItem->options->color !== null)         
                            <span>{{ $cartItem->options->color}}</span><br>
                            @endif
                              @if($cartItem->options->print !== null) 
                            <span>{{ $cartItem->options->print}}</span><br>
                              @endif
                              @if($cartItem->options->phoneModel !== null) 
                            <span>{{ $cartItem->options->phoneModel}}</span><br>
                              @endif
                              @if($cartItem->options->caseStyle !== null) 
                            <span>{{ $cartItem->options->caseStyle}}</span><br>
                            @endif
                              @if($cartItem->options->customCase !== null) 
                            <span>{{ $cartItem->options->customCase}}</span><br>
                            @endif
                              @if($cartItem->options->coasterShape !== null) 
                              <span>{{ $cartItem->options->coasterShape}}</span><br>
                            @endif
                            @if($cartItem->options->coasterDesign !== null) 
                            <span>{{ $cartItem->options->coasterDesign}}</span><br>
                            @endif
                            @if($cartItem->options->maskLocation !== null) 
                            <span>{{ $cartItem->options->maskLocation}}</span><br>
                            @endif
                            @if($cartItem->options->sackType !== null) 
                            <span>{{ $cartItem->options->sackType}}</span><br>
                            @endif
                            @if($cartItem->options->magnetShape !== null) 
                            <span>{{ $cartItem->options->magnetShape}}</span><br>
                            @endif
                             
                             
                             
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format((float)$cartItem->price, 2, '.', '')}}&euro;</p>
                        </td>
                        <td class="cart_quantity">
                            <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                            <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                            <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                        </td>
                        <td class="cart_total">
                            <p class="cart_total-price" id="subtotal<?php echo $count;?>">{{ number_format((float)$cartItem->subtotal, 2, '.', '') }}</p>
                        </td>
                        <td class="cart_delete">
                            <button><a href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}">x</a></button>
                        </td>
                    </tr>
                <?php $count++;?>
            </tbody>
            @endforeach
        </table>

        </div>
    <!-- End of Updatediv -->
    </div>
</div>
</section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="block-body order-summary">
               {{--  <ul class="order-menu list-unstyled">
                    <li>
                        <span id="countTotal">{{$countTotal}}</span> <span> items</span>
                     
                        <strong id="cartTotal1"  style="float: right;">&euro;{{$cartSubTotal}}</strong>
                    </li>
                    <li class="d-flex justify-content-between">
                        <span>Shipping and handling</span><strong>&euro;3</strong>
                    </li>
                    <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotal">&euro;{{$cartSubTotal+3}}</strong></li>
                </ul> --}}
                @if(!Auth::user())
                <div class="account">
                    <div>
                        <img src="/site-images/account.png" alt="">
                    </div>
                    <div class="account-right">
                        <p>Already have an account?</p>
                        <a href="{{ url('/login') }}">Login</a> /
                        <a href="{{ route('register') }}">Signup</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
   <!--  Checkout -->

<section class="checkout">  
    <div class="container">
        <div class="shipping-details">
            <div class="shipping-details-title">
                <div class="number-one">1.</div>
                <h6 class="text-uppercase">What are your shipping details?</h6>                
            </div>
            <form action="/" method="post" >
            @csrf

                <div class="shipping-details-form">
                    <div class="">
                        <label for="firstname" class="form-label">First Name</label>           
                        <input id="firstname" type="text" name="firstname" placeholder="e.g. John"  value="{{ (isset($ads->firstname)) ? $ads->firstname : old('firstname') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('firstname') }}</span>     
                    </div>
                    <div class="">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input id="lastname" type="text" name="lastname" placeholder="e.g. Doe" value="{{ (isset($ads->lastname)) ? $ads->lastname : old('lastname') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('lastname') }}</span>
                    </div>
                    <div class="">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" placeholder="e.g. johndoe@gmai.com" value="{{ (isset($ads->email)) ? $ads->email : old('email') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="">
                        <label for="phone" class="form-label">Phone</label>
                        <input id="phone" type="text" name="phone" placeholder="e.g. 068/123-123" value="{{ (isset($ads->phone)) ? $ads->phone :  old('phone') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('phone') }}</span>
                    </div>
                    <div class="">
                        <label for="street" class="form-label">Street Address</label>
                        <input id="street" type="text" name="street" placeholder="e.g. Sutter Str 111" value="{{ (isset($ads->street)) ? $ads->street :  old('street') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('street') }}</span>
                    </div>
                    <div class="">
                        <label for="zip" class="form-label">Zip Code</label>
                        <input id="zip" type="text" name="zip" placeholder="e.g. 81000" value="{{ (isset($ads->zip)) ? $ads->zip : old('zip') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('zip') }}</span>
                    </div>
                   {{--  <div class="">
                        <label for="city" class="form-label">City Name</label>                   
                        <input id="city" type="text" name="city" placeholder="e.g. Podgorica" value="{{ (isset($ads->city)) ? $ads->city : old('city') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('city') }}</span>
                    </div> --}}
                    <div class="cart_select">
                        <label for="city" class="form-label">City Name</label>     
                        <select class="select_city" id="" name="city" >
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
                    </div>
                </div>
            </form>
            <div style="margin:30px auto;"> 


                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div  class="continue">                       
                          <button id="pay-with-card" class="collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Continue with Card
                          </button>                        
                      </div>
                  
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">

                            <input type="hidden" value="" id="shipping_price">
                            <div>
                                <ul class="order-menu list-unstyled">
                                    
                                    <li class="d-flex justify-content-between"><span>Order Number:</span><strong>{{$order_number}}</strong></li>
                                    <li class="d-flex justify-content-between"><span>Company</span><strong> Monargo doo- Urban One</strong></li>
                                    <li>
                                        <span id="countTotalSecond">{{$countTotal}}</span> <span> items</span>
                                    <strong id="cartTotal1Second" style="float: right;">&euro;{{ number_format((float)$cartItem->subtotal, 2, '.', '') }}</strong>
                                    </li>
                                <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong id="strong_shipping">&euro;3</strong></li>
                               {{--  //dodati siping --}}
                                    <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotalSecond">&euro;{{ number_format((float)$cartItem->subtotal, 2, '.', '')+3.00 }}</strong></li>
                                </ul>
                            </div>
                            <form id="payment_form"  action="/formvalidate" method="POST" onsubmit="interceptSubmit(); return false;" class='test-form'>
                                @csrf
                                <input type="hidden" value="{{$order_number}}" name="order_number">
                                <input type="hidden" name="transaction_token" id="transaction_token" />
                              {{--   //dodati siping --}}
                                <input type="hidden" name="amount" id="amount" value="{{number_format((float)$cartSubTotal, 2, '.', '')}}">

                                <div class="payment">
                                <div style="width:100%;">
                                    <img style="width: 250px; margin:auto;  " src="\site-images\banner-010.png" alt="">
                                </div>                         
                                <h6>What are your credit card details?</h6>
                                <div class="form-group" class="form-label">
                                    <label for="card_holder">Card holder</label>
                                    <input type="text" id="card_holder" name="card_holder" placeholder="e.g. John Doe" value="{{ old('card_holder') }}" required />
                                    <span id="cardHolderError" style="color:red"></span>
                                </div>
                                <div  class="form-group">
                                    <label for="number_div" class="form-label">Card number</label>
                                    <div id="number_div"></div>
                                    <span id="cardError" style="color:red"></span>
                                </div> 
                                <div  class="form-group" >
                                    <label for="cvv_div">CVV</label>
                                    <div id="cvv_div"></div>
                                    <span id="cvvError" style="color:red"></span>
                                </div>
    
                                <div  class="form-group">
                                    <label for="exp_month" class="form-label">Month</label>
                                    <input type="text" id="exp_month" name="exp_month" value="{{ old('exp_month') }}"  placeholder="e.g. 05" required />
                                    <span id="monthError" style="color:red"></span>
                                </div>
                                <div  class="form-group">
                                    <label for="exp_year" class="form-label">Year</label>
                                    <input type="text" id="exp_year" name="exp_year" value="{{ old('exp_year') }}" placeholder="e.g. 23"  required/>
                                    <span id="yearError" style="color:red"></span>
                                </div>
                                <div  class="form-group" style="flex-direction: row-reverse;align-items: baseline;justify-content: flex-end;">
                                    <a href="/help_center"{{--  data-toggle="modal" data-target="#termsModal" --}} target="_blank" style="margin-left:10px"> Read more</a>
                                    <label for="agreement" class="form-label" style="margin-left: 10px;">I agree to the payment terms</label>
                                    <input type="checkbox" id="agreement" name="agreement" required>                                             
                                </div>
                                <div style="text-align: center">
                                    <input type="submit" value="Card" name="action" class="submit-button" style="    width: 35%;border: none;border-radius: 5px;color: white;padding: 5px;">
                                </div>
                            </div> 
                            </form>
                         </div>
                      </div>
                    </div>
                    <div class="card">
                     {{--  <div class="continue">                 
                            <button id="pay-with-cash" class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Continue with Cash</button>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                        <input type="submit" value="Cash" name="action" class="submit-button">
                      </div> --}}
                    </div>
                  </div>



            </div>

        <div>
    </div>
</section>
@endif

@include('layouts.about_urban_web')
<div class="subscribe-bottom">
    <div>
        <p>EUR - English</p>
        <p>Mature content: Visible</p>
    </div>
</div>

<script src="/js/payment.js"></script>

<script>
$(document).ready(function() {
   $('[data-toggle="popover"]').popover({
      placement: 'top',
      trigger: 'hover'
   });
});
</script>

@endsection
