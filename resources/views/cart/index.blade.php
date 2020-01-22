@extends('layouts.master')

@section('content')

<script>
    $(document).ready(function(){
    <?php for($i=1; $i<20; $i++){ ?>
        $('#upCart<?php echo $i;?>').on('change keyup', function(){
            var newqty = $('#upCart<?php echo $i; ?>').val();
            var rowId = $('#rowId<?php echo $i; ?>').val();
            var proId = $('#proId<?php echo $i; ?>').val();
                if(newqty <= 0) {alert('enter only valid qty')}
                else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update'); ?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" +rowId + "& proId=" +proId,
                        success: function(response) {
                            console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }
        });
    <?php } ?>
    });
</script>
<?php if($cartItems->isEmpty()) {?>
    <section id="cart_items" style="padding:200px">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Shopping cart</li>
                </ol>
            </div>
            <div><img src="{{ asset('/images/empty-cart.png') }}" alt=""></div>
        </div>
    </section>
<?php } else { ?>
    <br>
    <br>
    <section id="cart_items"  style="padding:200px">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Shopping cart</li>
                </ol>
            </div>
            <div id="updateDiv">
                <div class="table-response cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Image</td>
                                <td class="description">Description</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                            </tr>
                            @if(session('status'))
                                <div class="alert alert-success">   
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">   
                                    {{ session('error') }}
                                </div>
                            @endif
                        </thead>
                        <?php $count=1; ?>
                        @foreach($cartItems as $cartItem)
                        <tbody>
                            <tr>
                                <td class="cart_product">
                                    <p><img src="{{ url('images', $cartItem->img) }}" class="card-img-top bmw" alt=""></p>
                                </td>
                                {!! Form::open(['url' => ['cart/update', $cartItem->rowId], 'method' => 'put']) !!}
                                @csrf
                                <td class="card_description">
                                    <a href="{{ url('/product_details') }}/{{ $cartItem->id }}"></a>
                                    <div class="card" style="width:30rem;height:20rem;">
                                        <h4><a href="{{ url('/product_details') }}/{{$cartItem->id}}" style="color:blue;">{{ $cartItem->name }} </a></h4>
                                        <p>Produc ID: {{ $cartItem->id }}</p>
                                        <p>Only {{ $cartItem->options->stock}} left in stock</p>
                                    </div>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $cartItem->price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input type="hidden" id="rowId<?php echo $count;?>" value="{{ $cartItem->rowId}}">
                                        <input type="hidden" id="proId<?php echo $count;?>" value="{{ $cartItem->proId}}">
                                        <input type="number" value="{{ $cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>" 
                                            autocomplete="off" style="text-align: center;max-width:50px;" MIN='1' MAX="30">
                                        <br>
                                        <input type="submit" class="btn btn-primary" value="Update" style="margin:5px;">
                                    </div>
                                </td>
                                {!! Form::close() !!}
                                <td class="cart_total">
                                    <p class="cart_total-price">{{ $cartItem->subtotal }}</p>
                                </td>
                                <td class="cart_delete">
                                    <button class="btn btn-primary"><a href="{{ url('/cart/remove') }}/{{ $cartItem->rowId }}" class="cart_quantity_delete" style="background-color: red;">x</a></button>
                                </td>
                            </tr>
                            <?php $count++?>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
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