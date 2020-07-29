@extends('layouts.master')
@section('content')
<section>
    <div class="container">
        <div class="row">
        @include('profile.menu')
            <div class="col-md-8">
                @if ($Products->isEmpty())
                Products not found
             @else
                 @foreach($Products as $product)

                 <div class="product">
                     <a href="{{ url('/product_details', [$product->id]) }}" class="">
                         <div class="">
                             <div class="img-div">
                                @if ($product->images)  
                                         
                                        @foreach ($product->images as $item)                                      
                                            @if($product->category->name=="T-Shirts")
                                                @if ($item->color == "white" && $item->position == "front")
                                                <img src="{{ url('image', $item->name) }}" class="" alt="das">
                                                @break
                                                @else
                                                <img src="{{ url('image', $item->name) }}" class="" alt="as">
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
                                    
                                    <img src="{{ url('image', $item->name) }}" class="" alt="">
                                
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
                                     <p>{{ $product->price}}&euro;</p>
                                 @else
                                     <p>{{$product->spl_price}}&euro;</p>
                                 @endif
                             </div>
                         </div>
                     </a> 
                 </div>

                    {{--  <div class="product-image-wrapper">
                         <div class="single-products">
                             <div class="productinfo text-center">
                                 <a href="{{url('/product_details')}}">
                                    <img src="{{url('images',$product->image)}}" alt="" style="width:300px;height:300px;" />
                                 </a>
                                 <h2>$ {{$product->price}}</h2>

                                 <p><a href="{{url('/product_details')}}/{{$product->id}}">{{$product->name}}</a></p>
                                 <a href="{{url('/cart/addItem')}}/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>
                             </div>
                             
                         </div>                      
                     <a href="{{url('/')}}/removeWishList/{{$product->id}}" style="color:red" class="btn btn-default btn-block"><i class="fa fa-minus-square"></i>Remove from wishlist</a></li>
                     </div> --}}
                 @endforeach
            
             @endif
            </div>
    </div>
</section>
@endsection