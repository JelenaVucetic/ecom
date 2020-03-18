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
            $('#cartTotal').html(data.cartTotal) ;
            $('#cartTotal1').html(data.cartTotal);
            $('#oldPrice').html(data.oldPrice);
            $('#countTotal').html(data.countTotal);
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
            <p>Order three products and get 10% off</p>
            <p>Order five products and get 20% off</p>
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
        <div class="table-responsive cart_info">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Image</td>
                    <td class="description">Product</td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
            </thead>
         <?php $count =1;?>
            @foreach($cartItems as $cartItem)

                <tbody>
                    <tr>
                        <td class="cart_product">
                         <p><img style="width:200px;" src="{{url('images',$cartItem->options->img)}}" class="card-img-top bmw" ></p>
                        </td>
                        <td class="cart_description">
                            <a href="{{url('/product_details')}}/{{$cartItem->id}}">
                            <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                            <p>Product ID: {{$cartItem->id}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$cartItem->price}}</p>
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
                            <button class="btn btn-primary"><a href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}" class="cart_quantity_delete" style="background-color: red;">x</a></button>
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
                    <li class="d-flex justify-content-between">
                        <span id="countTotal">{{$countTotal}}</span> <span> items</span>
                       <!--  odje treba neko if -->
                        <span id="oldPrice">${{ $oldPrice }}</span> 
                        <strong id="cartTotal1">${{$cartSubTotal}}</strong>
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
        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="checkout1.html" class="nav-link active">Address</a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Delivery Method </a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
                    <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                </ul>
            <div class="tab-content">
                <div id="address" class="active tab-block">
                <form action="{{url('/')}}/formvalidate" method="post">
               @csrf
                    <div class="row">
                    <h1>Shopper Information</h1>
                    <div class="form-group col-md-6">
                        <label for="firstname" class="form-label">First Name</label> 
                        <input id="firstname" type="text" name="firstname" placeholder="First Name"  value="{{ old('firstname') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('firstname') }}</span>     
                         
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Last Name" value="{{ old('lastname') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('lastname') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="street" class="form-label">Street Address</label>
                        <input id="street" type="text" name="street" placeholder="Street Address" value="{{ old('street') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('street') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="zip" class="form-label">Zip Code</label>
                        <input id="zip" type="text" name="zip" placeholder="Zip Code" value="{{ old('zip') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('zip') }}</span>
                    </div>
                        <div class="form-group col-md-6">
                        <label for="city" class="form-label">City Name</label>                   
                        <input id="city" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control">
                        <br>
                        <span style="color:red">{{ $errors->first('city') }}</span>
                    </div>
                    <hr>
                        <!-- <span>
                            <input type="radio" name="pay" value="COD" checked="checked"> COD
                        </span>
                        <span>
                            <input type="radio" name="pay" value="paypal"> PayPal                     
                        </span>                         
                        <span> -->
                        <br>
                        <input type="submit" value="Continue" class="btn btn-primary btn-sm">
                    </div>
                </form>
                </div>
            </div>
            </div>
            
        </div>
    </div>
   </section>
@endif


@endsection
