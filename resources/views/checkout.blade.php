@extends('layouts.master')

@section('content')
<br>
<br>
<br>
<br>
 <section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
            <h1>Checkout</h1>
            <p class="lead text-muted">You currently have 3 item(s) in your basket</p>
            </div>
            <ul class="breadcrumb d-flex justify-content-start justify-content-lg-center col-lg-3 text-right order-1 order-lg-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Checkout</li>
            </ul>
        </div>
    </div>
</section>
<!-- Checout Forms-->
 <div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
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
                <a href="{{url('/product_details')}}/{{$cartItem->id}}"><img src="{{$cartItem->options->img}}" alt="" width="200px"></a>
            </td>
        
            <td class="cart_description">
                <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                <p>Product ID: {{$cartItem->id}}</p>
            </td>
            <td class="cart_price">
                <p>${{$cartItem->price}}</p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">
                    <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                    <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                    <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                            autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30">
                    <br>
        
                     
                </div>
            </td>
            <td class="cart_total">
                <p class="cart_total_price" id='subtotal<?php echo $count;?>'>${{$cartItem->subtotal}}</p>
            </td>
            <td class="cart_delete">
                <a class="cart_quantity_delete" style="background-color:red"
                    href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>
            </td>
            </tr>

<?php $count++;    ?>
        </tbody>  @endforeach
    </table>
</div>
    <?php  // form start here ?>
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
                <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="cart.html" class="btn btn-template-outlined wide prev"> <i class="fa fa-angle-left"></i>Back to basket</a><a href="checkout2.html" class="btn btn-template wide next">Choose delivery method<i class="fa fa-angle-right"></i></a></div>
                </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="block-body order-summary">
                <h6 class="text-uppercase">Order Summary</h6>
                <p>Shipping and additional costs are calculated based on values you have entered</p>
                <ul class="order-menu list-unstyled">
                <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="cartTotal">${{$cartSubTotal}}</strong></li>
                <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$10.00</strong></li>
                <li class="d-flex justify-content-between"><span>Tax</span><strong>${{Cart::tax()}}</strong></li>
                <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">${{Cart::total()}}</strong></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
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
            $('#cartTotal').html('$' + data.cartTotal);
        }
    });

     }
    });
  <?php } ?>
});
    </script>
</section>
@endsection
