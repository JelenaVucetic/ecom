@extends('layouts.master')

@section('cart-about-style.css')
    <link rel="stylesheet" href="/css/cart-about.css">
@endsection

@section('content')
<script>
$(document).ready(function(){
for( let i=1;i<20;i++) {
    $('#upCart'+i).on('change keyup', function(){
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
            data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
            success: function (data) {
                $('#upCart'+i).html(data.qty);
                $('#subtotal'+i).html(data.subtotal);
                $('#cartTotal').html(data.cartTotal);
                $('#cartTotal1').html(data.cartTotal);
                $('#oldPrice').html(data.oldPrice);
                $('#countTotal').html(data.countTotal);
                $('#cartTotalSecond').html(data.cartTotal);
                $('#cartTotal1Second').html(data.cartTotal);
                $('#countTotalSecond').html(data.countTotal);
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
    for( let i=1;i<20;i++) {
        $('#upCartPhone'+i).on('change keyup', function(){
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
                data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                success: function (data) {
                    $('#upCartPhone'+i).html(data.qty);
                    $('#subtotalPhone'+i).html(data.subtotal);
                    $('#cartTotal').html(data.cartTotal);
                    $('#cartTotal1').html(data.cartTotal);
                    $('#oldPrice').html(data.oldPrice);
                    $('#countTotal').html(data.countTotal);
                    $('#cartTotalSecond').html(data.cartTotal);
                    $('#cartTotal1Second').html(data.cartTotal);
                    $('#countTotalSecond').html(data.countTotal);
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
            <p>Order <strong>five</strong> products and get 20% off</p>
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
                <div>
                    <img style="width:150px;" src="{{url('images',$cartItem->options->img)}}" class="">
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
                          @if($cartItem->options->customSize !== null && $cartItem->options->customSize !== 'x') 
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
                         <p><img style="width:150px;" src="{{url('images',$cartItem->options->img)}}" class="card-img-top bmw"></p>
                        </td>
                        <td class="cart_description">
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
                              @if($cartItem->options->customSize !== null && $cartItem->options->customSize !== 'x') 
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
                             
                             
                        </td>
                        <td class="cart_price">
                            <p>{{$cartItem->price}}&euro;</p>
                        </td>
                        <td class="cart_quantity">
                            <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                            <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                            <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                        </td>
                        <td class="cart_total">
                            <p class="cart_total-price" id="subtotal<?php echo $count;?>">{{ $cartItem->subtotal }}</p>
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
                <ul class="order-menu list-unstyled">
                    <li>
                        <span id="countTotal">{{$countTotal}}</span> <span> items</span>
                     
                        <strong id="cartTotal1"  style="float: right;">&euro;{{$cartSubTotal}}</strong>
                        <!--  odje treba neko if -->
                        <span id="oldPrice"  style="float: right;">&euro;{{ $oldPrice }}</span> 
                    </li>
                    <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>Free</strong></li>
                    <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotal">&euro;{{$cartSubTotal}}</strong></li>
                </ul>
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
            <form  id="payment_form"  action="{{url('/')}}/formvalidate" method="POST" onsubmit="interceptSubmit(); return false;" class='test-form'>
            @csrf
            <input type="hidden" name="transaction_token" id="transaction_token" />
            <input type="hidden" name="amount" id="amount" value="{{$cartSubTotal}}">
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
                        <span style="color:red">{{ $errors->first('email') }}</span>
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
                    <div class="">
                        <label for="city" class="form-label">City Name</label>                   
                        <input id="city" type="text" name="city" placeholder="e.g. Podgorica" value="{{ (isset($ads->city)) ? $ads->city : old('city') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('city') }}</span>
                    </div>
                </div>
            <div style="margin:30px auto;">     
                <div class="continue" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor:pointer;">
                    <button id="review-and-pay">Continue</button>                
                </div>      
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div>
                            <ul class="order-menu list-unstyled">
                                <li class="d-flex justify-content-between"><span>Order Number:</span><strong>XYZ-0001</strong></li>
                                <li class="d-flex justify-content-between"><span>Company</span><strong>Urban One</strong></li>
                                <li>
                                    <span id="countTotalSecond">{{$countTotal}}</span> <span> items</span>
                                    <strong id="cartTotal1Second" style="float: right;">&euro;{{$cartSubTotal}}</strong>
                                </li>
                                <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>Free</strong></li>
                                <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotalSecond">&euro;{{$cartSubTotal}}</strong></li>
                            </ul>
                        </div>
                        <div class="payment">
                            <div style="width:100%;">
                                <img style="width: 300px; margin:auto;  " src="\site-images\visa-mastercard-horizontal.svg" alt="">
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
                            <div  class="form-group">
                                <label for="agreement" class="form-label">I agree to the payment terms</label>
                                <input type="checkbox" id="agreement" name="agreement" required>
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Submit" class="submit-button">
                    </div>
                </div>      
                <div id="hide-review" class="shipping-details-title">
                    <div class="number-one">2.</div>
                    <h6 class="text-uppercase">Review and pay</h6>                
                </div>
            </div>
            </form>
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

@endsection
