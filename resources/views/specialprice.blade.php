@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row spcial-price-row">
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
                           
                                @if ($product->images)
                                @foreach ($product->images as $item)
                                @if($product->category->name=="T-Shirts")
                                  @if ($item->color == "white" && $item->position == "front")
                                  <img src="{{ url('image', $item->name) }}" class="" alt="">
                                  @break
                                  @endif
                                  @elseif( $product->category->getParentsNames() == "Cases" && $item->color == "transparent")
                                  <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                                  @break
                                  @elseif($product->category->name=="Pictures")
                                  <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                                  @break
                                  @elseif($product->category->name=="Wallpapers")
                                  <img src="{{ url('image', $item->name) }}" class="img-div-wallpapers" alt="">
                                  @break
                                  @else
                                  <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                                  @break
                                  @endif
                                @endforeach
                               
                               @else
                                <img src="{{ url('images', $product->image) }}" class="" alt="">
                                @break
                                @endif
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
                                    <p>From: <span style="font-weight: bold">{{ $product->price}}&euro;</span></p>
                                @else
                                    <p>Special price: <span style="font-weight: bold">{{$product->spl_price}}&euro;</span></p>
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