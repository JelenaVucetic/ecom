@extends('layouts.master')

@section('content')
<script>
    $(document).ready(function(){
        $('#size').change(function(){
            var size = $('#size').val();
            var proDum = $('#proDum').val();
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '<?php echo url('/selectSize'); ?>',
                data: "size=" + size + "& proDum=" + proDum,
                success: function(response) {
                    console.log(response)
                }
            });
        });
    });
</script>

<div class="container align-vertical hero">
    <div class="row">
        <div class="col-md-5 text-left">

        </div>
    </div>
</div>
<section id="index-amazon" style="padding:200px">
    <div class="amazon">
        <div class="container">
            <div class="row">
                <div class="product" style="display:flex;">
                @foreach($Products as $product)
                    <div class="row">
                        <div class="thumbnail">
                            <img style="width:400px;height:400px" src="{{url('images', $product->image)}}" alt="" class="card-img"> <br>
                        </div>
                    </div>
                    <div class="col-md-offset-1" style="padding-left:50px;">
                        <div class="product_details">
                            <h2 class="product-title">
                                <?php echo ucwords($product->name); ?>
                            </h2>
                            <p>{{ $product->description}}</p>

                            <span id="price">
                            @if($product->spl_price==0)
                                <input type="hidden" value="<?php echo $product->price;?>">
                            <p><b>Price:</b> <span id="price">{{ $product->price}} </span>&euro;</p>
                            @else
                                <div class="d-flex justify-content-between align-items-center">
                                     <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice">
                                    <p class="" style="text-decoration:line-through; color:#333">${{$product->price}}</p>
                                    <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                    <p class="">${{$product->spl_price}}</p>
                                </div>
                            @endif
                            </span>
                            <p><b>Availability:</b> {{ $product->stock}} In Stock</p>
                        <?php $sizes = DB::table('products_properties')->where('pro_id', $product->id)->get(); ?>
                            <select name="size" id="size">
                                @foreach($sizes as $size)
                                <option >{{$size->size}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="<?php echo $product->id; ?>" id="proDum">
                            <br>
                            <br>
                            <button class="btn btn-primary btn-sm">
                                <a href="{{ url('/cart/addItem', [$product->id]) }}" class="add-to-cart" style="color:white;">Add to cart</a>
                            </button>
                            <?php
                                $wishData = DB::table('wishlist')->rightJoin('product', 'wishlist.pro_id', '=', 'product.id')->
                                                where('wishlist.pro_id', '=', $product->id)->get();
                                $count = App\Wishlist::where(['pro_id' => $product->id])->count();
                            ?>
                            <?php if($count == "0") { ?>

                                {!! Form::open(['route' => 'addToWishlist', 'method' => 'post']) !!}
                                <input type="hidden" value="{{$product->id}}" name="pro_id">
                                <br>
                                <input type="submit" value="Add to Wishlist" class="btn btn-primary">
                                {!! Form::close() !!}
                            <?php } else { ?>
                                <h3 style="color:green;">Alredy Added to wishlist
                                    <a href="{{ url('/wishlist') }}">wishlist</a>
                                </h3>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
<div class="no-padding-top section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="" class="load-more"> <i class="fa fa-ellipsis-h"></i> </a>

            </div>
        </div>
    </div>
</div>
@include('recommends')
@endsection
