@extends('layouts.master')

@section('content')
<div class="container-fluid" style="width: 90%;margin:auto">
  <div class="design-for-you">
    <h2>Designs picked for you</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick2">
      @foreach ($designs as $design)
        <div class="slide-item">
          <div class="design-box">
            <img src="/image/{{$design->name}}">
            <div class="count-product">
              <p>Proizvoda
              <?php
                  $count = DB::table('product')->where('design_id', $design->id)->groupBy('design_id')->count(); ?>
                <span>{{$count}}</span>
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>


<div class="container-fluid"  style="width: 90%;margin:auto">
  <div class="design-for-you">
    <h2>Most popular designs - TRENDING</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick3">
      @foreach ($designs as $design)
        <div class="slide-item">
          <div class="design-box">
            <img src="/image/{{$design->name}}">
            <div class="count-product">
              <p>Proizvoda
              <?php
                  $count = DB::table('product')->where('design_id', $design->id)->groupBy('design_id')->count(); ?>
                <span>{{$count}}</span>
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>



<div class="container-fluid"  style="width: 90%;margin:auto">
  <div class="design-for-you">
    <h2>Premium T-shirts</h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick4">
      @foreach ($tShirts as $tshirt)
        <div class="slide-item">
          <div class="product">
            <a href="{{ url('/product_details', [$tshirt->id]) }}" class="">
              <div class="">
                <div class="img-div">
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
                    @elseif($tshirt->category->name=="Pictures")
                    <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
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
                        <p>{{ $tshirt->price}}&euro;</p>
                    @else
                        <p>{{$tshirt->spl_price}}&euro;</p>
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

<div class="container-fluid"  style="width: 90%;margin:auto">
  <div class="design-for-you">
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
                    <p class="">{{ $case->name }}</p>
                    <?php
                        $pro_cat = App\Product::find($case->id);
                        if($pro_cat->category != null){
                    ?>
                        <p class="">{{ $pro_cat->category->name }}</p>
                    <?php } ?>
                    @if($case->spl_price==0)
                        <p>{{ $case->price}}&euro;</p>
                    @else
                        <p>{{$case->spl_price}}&euro;</p>
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

<div class="container-fluid"  style="width: 90%;margin:auto">
  <div class="design-for-you">
    <h2>Hoodies </h2>
  </div>

  <div class="slick-wrapper">
    <div id="slick6">
      @foreach ($hoodies as $hoodie)
        <div class="slide-item">
          <div class="product">
            <a href="{{ url('/product_details', [$hoodie->id]) }}" class="">
              <div class="">
                <div class="img-div">
                           
                  @if ($hoodie->images)
                  @foreach ($hoodie->images as $item)
                  @if($hoodie->category->name=="T-Shirts")
                    @if ($item->color == "white" && $item->position == "front")
                <img src="{{ url('image', $item->name) }}" class="" alt="">
                    @break
                    @endif
                    @elseif( $hoodie->category->getParentsNames() == "Cases" && $item->color == "transparent")
                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                    @break
                    @elseif($hoodie->category->name=="Pictures")
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
                  <img src="{{ url('images', $hoodie->image) }}" class="" alt="">
                  @break
                  @endif
              </div>
                <div class="">
                    <p class="">{{ $hoodie->name }}</p>
                    <?php
                        $pro_cat = App\Product::find($hoodie->id);
                        if($pro_cat->category != null){
                    ?>
                        <p class="">{{ $pro_cat->category->name }}</p>
                    <?php } ?>
                    @if($hoodie->spl_price==0)
                        <p>{{ $hoodie->price}}&euro;</p>
                    @else
                        <p>{{$hoodie->spl_price}}&euro;</p>
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
