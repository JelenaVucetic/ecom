@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">
                @if (isset($msg))
                    {{ $msg}}
                @else  Special price
                @endif
            </h2>

            @if ($products->isEmpty())
                sorry, products not found
            @else
            <div class="row">
                @foreach($products as $product)

                <div class="product">
                    <a href="{{ url('/product_details', [$product->id]) }}" class="">
                        <div class="">
                            <div class="img-div">
                                <img src="{{ url('images', $product->image) }}" class="" alt="">
                            </div>
                            <div class="">
                                <p class="">{{ $product->name }}</p>
                                <?php
                                    $pro_cat = App\Product::find($product->id);
                                    if($pro_cat->category != null){
                                ?>
                                    <p class="">{{ $pro_cat->category->name }}</p>
                                <?php } ?>
                                @if($product->spl_price==0)
                                    <p>{{ $product->price}}&euro;</p>
                                @else
                                    <p>{{$product->spl_price}}&euro;</p>
                                @endif
                            </div>
                        </div>
                    </a> 
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.about_urban_web')
@include('layouts.subscribe')
@endsection