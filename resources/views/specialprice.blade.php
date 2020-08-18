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
                                @elseif($product->category->name=="Canvas Art")
                                <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                                @break
                                @elseif($product->category->name=="Wallpapers")
                                <img src="{{ url('image', $item->name) }}" class="img-div-wallpapers" alt="">
                                @break
                                @elseif($product->category->name=="Notebooks")
                                <img src="{{ url('image', $item->name) }}" class="img-div-notebooks" alt="">
                                @break
                                @elseif($product->category->name=="Makeup Bags")
                                <img src="{{ url('image', $item->name) }}" class="img-div-makeup" alt="">
                                @break
                                @elseif($product->category->name=="Masks")
                                <img src="{{ url('image', $item->name) }}" class="img-div-masks" alt="">
                                @break
                                @elseif($product->category->name=="Thermoses")
                                <img src="{{ url('image', $item->name) }}" class="img-div-thermos" alt="">
                                @break
                                @elseif($product->category->name=="Mugs")
                                <img src="{{ url('image', $item->name) }}" class="img-div-mugs" alt="">
                                @break
                                @elseif($product->category->name == "Gift Bags")
                                <img src="{{ url('image', $item->name) }}" class="img-div-gift-bags" alt="">
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
                                <p class="product-name">{{ $product->name }}</p>
                                <?php
                                    $pro_cat = App\Product::find($product->id);
                                    if($pro_cat->category != null){
                                ?>
                                    <p class="product-category">{{ $pro_cat->category->name }}</p>
                                <?php } ?>
                                @if($product->spl_price==0)
                                    <p><span style="font-weight: bold">&euro;{{ $product->price}}</span></p>
                                @else
                                    <p><span style="font-weight: bold">&euro;{{$product->spl_price}}</span></p>
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
