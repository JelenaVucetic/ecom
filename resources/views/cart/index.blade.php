@extends('layouts.master')

@section('content')
<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>

$('#upCart<?php echo $i;?>').on('change keyup', function(){
    var newqty = $('#upCart<?php echo $i;?>').val();
    var rowId = $('#rowId<?php echo $i;?>').val();
    var proId = $('#proId<?php echo $i;?>').val();
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
        url: '<?php echo url('/cart/updateCart');?>/'+proId,
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (data) {
           // $('#updateDiv').html(response);
            $('#upCart<?php echo $i;?>').html(data.qty);
            $('#subtotal<?php echo $i;?>').html(data.subtotal);
            $('#cartTotal').html(data.cartTotal);
            $('#cartTotal1').html(data.cartTotal);
            $('#oldPrice').html(data.oldPrice);
            $('#countTotal').html(data.countTotal);
            $('#cartTotalSecond').html(data.cartTotal);
            $('#cartTotal1Second').html(data.cartTotal);
            $('#countTotalSecond').html(data.countTotal);
            $('#amount').val(data.cartTotal);
        }
    });

     }
    });
  <?php } ?>
});
</script>

@if($cartItems->isEmpty()) 

<section id="cart_items">
    <div class="container">
        <img src="{{asset('/images/empty-cart.png')}}"/>
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
                             <?php if($cartItem->options->size !== null) : ?>           
                            <span>{{$cartItem->options->size}}</span>
                             <?php endif;
                             if($cartItem->options->color !== null) :?>           
                            <span>{{ $cartItem->options->color}}</span>
                             <?php endif;
                              if($cartItem->options->color !== null) :?>     
                            <span>{{ $cartItem->options->print}}</span>
                              <?php endif; ?>
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
    <!-- End of Updatediv</div> -->
    </div>
</div>
</section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="block-body order-summary" style="width: 50%; margin: 30px auto;">
                <h6 class="text-uppercase">Order Summary</h6>
                <p>Free Shipping</p>
                <ul class="order-menu list-unstyled">
                    <li class="">
                        <span id="countTotal">{{$countTotal}}</span> <span> items</span>
                     
                       <strong id="cartTotal1"  style="float: right;">${{$cartSubTotal}}</strong>
                         <!--  odje treba neko if -->
                        <span id="oldPrice"  style="float: right;">${{ $oldPrice }}</span> 
                    </li>
                    <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>Free</strong></li>
                    <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotal">${{$cartSubTotal}}</strong></li>
                </ul>
            </div>
        </div>
    </section>
   <!--  Checkout -->

<section class="checkout">  
    <div class="container">
        <div style="width: 50%; margin: 30px auto;">
            <h6 class="text-uppercase">1. What are your shipping details?</h6>
            <form  id="payment_form"  action="{{url('/')}}/formvalidate" method="POST" onsubmit="interceptSubmit(); return false;" class='test-form'>
            @csrf
            <input type="hidden" name="transaction_token" id="transaction_token" />
            <input type="hidden" name="amount" id="amount" value="{{$cartSubTotal}}">
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="firstname" class="form-label">First Name</label> 
                    <input id="firstname" type="text" name="firstname" placeholder="e.g. John"  value="{{ old('firstname') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('firstname') }}</span>     
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input id="lastname" type="text" name="lastname" placeholder="e.g. Doe" value="{{ old('lastname') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('lastname') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" name="email" placeholder="e.g. johndoe@gmai.com" value="{{ old('email') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" type="text" name="phone" placeholder="e.g. 068/123-123" value="{{ old('phone') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="street" class="form-label">Street Address</label>
                    <input id="street" type="text" name="street" placeholder="e.g. Sutter Str 111" value="{{ old('street') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('street') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="zip" class="form-label">Zip Code</label>
                    <input id="zip" type="text" name="zip" placeholder="e.g. 81000" value="{{ old('zip') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('zip') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label for="city" class="form-label">City Name</label>                   
                    <input id="city" type="text" name="city" placeholder="e.g. Podgorica" value="{{ old('city') }}" class="form-control">
                    <br>
                    <span style="color:red">{{ $errors->first('city') }}</span>
                </div>
            </div>
            <div style=" margin: 30px auto;">           
                <h6 class="text-uppercase" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="cursor:pointer;">2. Review and pay</h6>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div>
                            <ul class="order-menu list-unstyled">
                                <li class="d-flex justify-content-between"><span>Order Number:</span><strong>XYZ-0001</strong></li>
                                <li class="d-flex justify-content-between"><span>Company</span><strong>Urban One</strong></li>
                                <li>
                                    <span id="countTotalSecond">{{$countTotal}}</span> <span> items</span>
                                    <strong id="cartTotal1Second" style="float: right;">${{$cartSubTotal}}</strong>
                                </li>
                                <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>Free</strong></li>
                                <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotalSecond">${{$cartSubTotal}}</strong></li>
                                <p>Prikaz logotipa omogućenih metoda plaćanja</p>
                            </ul>
                        </div>
                        <div class="payment" style="width: 50%;margin: auto;">
                            <div class="form-group col-md-6" class="form-label">
                                <label for="card_holder">Card holder</label>
                                <input type="text" id="card_holder" name="card_holder" placeholder="e.g. John Doe" value="{{ old('card_holder') }}" required />
                                <span id="cardHolderError" style="color:red"></span>
                            </div>
                            <div  class="form-group col-md-6">
                                <label for="number_div" class="form-label">Card number</label>
                                <div id="number_div" style="height: 35px; width: 200px;"></div>
                                <span id="cardError" style="color:red"></span>
                            </div> 
                            <div  class="form-group col-md-6" >
                                <label for="cvv_div">CVV</label>
                                <div id="cvv_div" style="height: 35px; width: 200px;"></div>
                                <span id="cvvError" style="color:red"></span>
                            </div>

                            <div  class="form-group col-md-6">
                                <label for="exp_month" class="form-label">Month</label>
                                <input type="text" id="exp_month" name="exp_month" value="{{ old('exp_month') }}"  placeholder="e.g. 05" required />
                                <span id="monthError" style="color:red"></span>
                            </div>
                            <div  class="form-group col-md-6">
                                <label for="exp_year" class="form-label">Year</label>
                                <input type="text" id="exp_year" name="exp_year" value="{{ old('exp_year') }}" placeholder="e.g. 23"  required/>
                                <span id="yearError" style="color:red"></span>
                            </div>
                            <div  class="form-group col-md-6">
                                <label for="agreement" class="form-label">I agree to the payment terms</label>
                                <input type="checkbox" id="agreement" name="agreement" required>
                           <!--      <span id="yearError" style="color:red"></span> -->
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>
            </form>
        <div>
    </div>
</section>

   <!-- Payment -->

   <section>
    
   </section>
@endif



<script src="/js/payment.js"></script>

@endsection
