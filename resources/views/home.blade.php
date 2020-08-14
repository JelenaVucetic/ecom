@extends('layouts.master')

@section('content')
<div class="container-fluid" style="width: 90%;margin:50px auto">
  <div class="design-for-you" style="margin:20px 0;">
    <h2>Designs picked for you</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick2">
      @foreach ($designs as $design)
        <div class="slide-item">
          <div class="design-box">
           <a href="{{route('productsDesign', $design->id)}}">
              <div class="design-image">
                <img src="/image/{{$design->name}}" style="max-witdh:100%;max-height:100%">
              </div>
            </a>
            <div class="count-product">
              <p>
              <?php
                  $count = DB::table('product')->where('design_id', $design->id)->groupBy('design_id')->count(); ?>
                <span>{{$count}}</span>
                Products with this design
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>


<div class="container-fluid"  style="width: 90%;margin: 50px auto">
  <div class="design-for-you"  style="margin:20px 0;">
    <h2>Most popular designs - TRENDING</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick3">
      @foreach ($designsRandom as $designsRandom)
        <div class="slide-item testnovi">
          <div class="design-box random">
            <div class="design-image">
              <img src="/image/{{$designsRandom->name}}" style="max-witdh:100%;max-height:100%">
            </div>

            <div class="count-product">
              <p>
              <?php
                  $count = DB::table('product')->where('design_id', $designsRandom->id)->groupBy('design_id')->count(); ?>
                <span>{{$count}}</span>
                Products with this design
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>



<div class="container-fluid"  style="width: 90%;margin: 50px auto">
  <div class="design-for-you" style="margin:20px 0;">
    <h2>Premium T-shirts</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick4">
      @foreach ($tShirts as $tshirt)
        <div class="slide-item">
          <div class="product"  id="slick-shirt">
            <a href="{{ url('/product_details', [$tshirt->id]) }}" class="">
              <div class="">
                <div class="img-div" id="slick-shirt-img">
                  @if ($tshirt->images)
                  @foreach ($tshirt->images as $item)
                  @if($tshirt->category->name=="T-Shirts")
                     @if ($item->color == "white" && $item->position == "front")
                    <img src="{{ url('image', $item->name) }}" class="" alt="">
                    @break
                    @endif
                    @elseif( $tshirt->category->getParentsNames() == "Cases" && $item->color == "transparent")
                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                    @break
                    @elseif($tshirt->category->name=="Canvas Art")
                    <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                    @break
                    @elseif($product->category->name=="Thermoses")
                    <img src="{{ url('image', $item->name) }}" class="img-div-thermos" alt="">
                     @break
                    @else
                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                    @break
                    @endif
                  @endforeach

                 @else
                  <img src="{{ url('images', $tshirt->image) }}" class="" alt="">
                  @break
                  @endif
              </div>
                <div class="">
                    <p class="">{{ $tshirt->name }}</p>
                    <?php
                        $pro_cat = App\Product::find($tshirt->id);
                        if($pro_cat->category != null){
                    ?>
                        <p class="">{{ $pro_cat->category->name }}</p>
                    <?php } ?>
                    @if($tshirt->spl_price==0)
                        <p>From: <span style="font-weight: bold">{{ $tshirt->price}}&euro;</span></p>
                    @else
                        <p>Special price:  <span style="font-weight: bold">{{$tshirt->spl_price}}&euro;</span></p>
                    @endif
                </div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<div class="container-fluid"  style="width: 90%;margin: 50px auto">
  <div class="design-for-you" style="margin:20px 0;">
    <h2>Phone Cases</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick5">
      @foreach ($cases as $case)
        <div class="slide-item">
          <div class="product">
            <a href="{{ url('/product_details', [$case->id]) }}" class="">
              <div class="">
                <div class="img-div">

                  @if ($case->images)
                  @foreach ($case->images as $item)
                  @if($case->category->name=="T-Shirts")
                    @if ($item->color == "white" && $item->position == "front")
                    <img src="{{ url('image', $item->name) }}" class="" alt="">
                    @break
                    @endif
                    @elseif( $case->category->getParentsNames() == "Cases" && $item->color == "transparent")
                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                    @break
                    @elseif($case->category->name=="Pictures")
                    <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                    @break
                    @else
                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                    @break
                    @endif
                  @endforeach

                 @else
                  <img src="{{ url('images', $case->image) }}" class="" alt="">
                  @break
                  @endif
              </div>
                  <div class="">
                    <p class="product-name">{{ $case->name }}</p>
                    <?php
                        $pro_cat = App\Product::find($case->id);
                        if($pro_cat->category != null){
                    ?>
                        <p class="product-category">{{ $pro_cat->category->name }}</p>
                    <?php } ?>
                    @if($case->spl_price==0)
                        <p><span style="font-weight: bold">&euro;{{ $case->price}}</span></p>
                    @else
                        <p><span style="font-weight: bold">&euro;{{$case->spl_price}}</span></p>
                    @endif
                </div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<div class="container-fluid"  style="width: 90%;margin: 50px auto">
  <div class="design-for-you" style="margin:20px 0;">
    <h2>Face Masks </h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick6">
      @foreach ($masks as $mask)
        <div class="slide-item">
          <div class="product">
            <a href="{{ url('/product_details', [$hoodie->id]) }}" class="">
              <div class="">
                <div class="img-div">

                  @if ($mask->images)
                  @foreach ($mask->images as $item)
                  @if($mask->category->name=="T-Shirts")
                    @if ($item->color == "white" && $item->position == "front")
                <img src="{{ url('image', $item->name) }}" class="" alt="">
                    @break
                    @endif
                    @elseif( $mask->category->getParentsNames() == "Cases" && $item->color == "transparent")
                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                    @break
                    @elseif($mask->category->name=="Pictures")
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
                  <img src="{{ url('images', $mask->image) }}" class="" alt="">
                  @break
                  @endif
              </div>
                <div class="">
                  <p class="product-name">{{ $mask->name }}</p>
                  <?php
                      $pro_cat = App\Product::find($mask->id);
                      if($pro_cat->category != null){
                  ?>
                      <p class="product-category">{{ $pro_cat->category->name }}</p>
                  <?php } ?>
                  @if($mask->spl_price==0)
                      <p><span style="font-weight: bold">&euro;{{ $mask->price}}</span></p>
                  @else
                      <p><span style="font-weight: bold">&euro;{{$mask->spl_price}}</span></p>
                  @endif
              </div>
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@include('layouts.subscribe')
@endsection
