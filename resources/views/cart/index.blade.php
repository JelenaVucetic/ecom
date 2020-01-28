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
        dataType: 'html',
        url: '<?php echo url('/cart/updateCart');?>/'+proId,
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });

     }
    });
  <?php } ?>
});
</script>

<?php if ($cartItems->isEmpty()) { ?>

<section id="cart_items" style="padding-top:200px">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div >  <img src="{{asset('/images/empty-cart.png')}}"/></div>
    </div>
</section> 
<?php } else { ?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"></a></li>
                <li class="active">Shopping Cart</li>
            </ol>
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
                            <p>Only {{$cartItem->options->stock}} left</p>
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
                            <p class="cart_total-price">{{ $cartItem->subtotal }}</p>
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
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$ {{ Cart::subtotal() }}</span></li>
                            <li>Tax <span>$ {{ Cart::tax() }}</span></li>
                            <li>Shipping cost <span>Free</span></li>
                            <li>Total <span>$ {{ Cart::total() }}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check-out" href="{{ url('/checkout') }}" >Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


@endsection