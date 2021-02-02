@extends('layouts.master')

@section('content')
<main role="main">
  @include('layouts.error')

<div class="my-main-div">
    <div class="welcome-image">
        {{-- <img src="/site-images/baner-maske-lice.jpg">  --}}
    </div>
    <div class="welcome-shop container">
        <div class="shop-product">
            <p>Shop Prodcut Range</p>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <a href="{{route('category.show',[ $shirtsCat->id, $shirtsCat->name => $shirtsCat->parent_id ])}}" style="color: inherit;">                    <div class="box-container">
                        <div class="box1-img-holder"></div>
                        <button>  Shop T-Shirts</button>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4">
                <a href="{{route('category.show',[$casesCat->id, $casesCat->name => $casesCat->id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box2-img-holder"></div>
                        <button>Shop Cases</button>
                    </div>
                </a>
            </div>
            <div id="box3" class="col-12 col-md-4">
                <a href="{{route('category.show',[ $faceMasksCat->id, $faceMasksCat->name => $faceMasksCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box3-img-holder"></div>
                        <button>Shop Masks</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="site-quality">
            <div class="site-box">
                <div class="site-quality-icon">
                    <img src="/site-images/Authentic-Icon.svg" alt="">
                </div>
                <div class="site-quality-text">
                    <p class="bold">Authentic designs</p>
                    <p>Thousends of designs that you can't buy anywhere else.</p>
                </div>
            </div>
            <div class="site-box">
                <div class="site-quality-icon">
                    <img src="/site-images/iconfinder_Express_mail_3615754.svg" alt="">
                </div>
                <div class="site-quality-text">
                    <p class="bold">Delivery at your doors</p>
                    <p> Every piece of design you want, you get right at your doors.</p>
                </div>
            </div>
            <div class="site-box">
                <div class="site-quality-icon">
                    <img src="/site-images/Ikonica High Quality.svg" alt="">
                </div>
                <div class="site-quality-text">
                    <p class="bold">High quality products </p>
                    <p>We gurantee high standard quality products.</p>
                </div>
            </div>
        </div>

      <!-- Gifts -->
    <div class="row gifts   ">
        <div class="col-6 gifts-for-him">
            <a href="/gifts_for_him" style="color: inherit;">
                <div class="box-container">
                    <div class="box10-img-holder"></div>
                    <img id="male" src="/site-images/216-Male.svg">
                    <button>Gifts for Him</button>
                </div>
            </a>
        </div>
        <div class="col-6 gifts-for-her">
            <a href="/gifts_for_her" style="color: inherit;">
                <div class="box-container">
                    <div class="box11-img-holder"></div>
                    <img id="female" src="/site-images/217-Female.svg" >
                    <button>Gifts for Her</button>
                </div>
            </a>
        </div>
    </div>

  <!--   Accessories -->


    <div class="">
        <div class="accessories">
            <p>Products that you like the most</p>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <a href="{{route('category.show',[$mugsCat->id, $mugsCat->name => $mugsCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box4-img-holder"></div>
                        <button>Mugs</button>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4">
                <a href="{{route('category.show',[$coastersCat->id, $coastersCat->name => $coastersCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box5-img-holder"></div>
                        <button>Coasters</button>
                    </div>
                </a>
            </div>
            <div id="box6" class="col-12 col-md-4">
                <a href="{{route('category.show',[$clocksCat->id, $clocksCat->name => $clocksCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box6-img-holder"></div>
                        <button>Clocks</button>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" id="second-row">
            <div class="col-6 col-md-4">
                <a href="{{route('category.show',[$sacksCat->id, $sacksCat->name => $sacksCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box7-img-holder"></div>
                        <button>Gift Bags</button>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4">
                <a href="{{route('category.show',[$magnetsCat->id, $magnetsCat->name => $magnetsCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box8-img-holder"></div>
                        <button>Magnets</button>
                    </div>
                </a>
            </div>
            <div id="box9" class="col-12 col-md-4">
                <a href="{{route('category.show',[ $postersCat->id, $postersCat->name => $postersCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box3-img-holder"></div>
                        <button>Shop Posters</button>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div>



    </div>
  <div class="album py-5 bg-light">
{{--     <div class="container">
      <div class="myRow">
              @forelse($products as $product)
                  <div class="col-md-3">
                      <div class="card mb-3 shadow-sm">
                          <img src="{{ url('images', $product->image) }}" class="card-img" alt="">
                        </div>
                          <div class="my-card-body">
                              <p class="my-card-text">{{ $product->name }}</p>
                               <p class="my-card-text">{{ $product->description }}</p>

                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-outline-primpary">
                                          <a href="{{ url('/product_details', [$product->id]) }}" class="add-to-cart"> View product</a>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-outline-primpary">
                                          <a href="{{ url('/cart/addItem', [$product->id]) }}" class="add-to-cart"> Add to cart</a>
                                      </button>
                                  </div>

                              </div>
                          </div>

                  </div>
              @empty
                  <h3>No products</h3>
              @endforelse
      </div>
    </div> --}}
    <div class="slick-wrapper">
    <div id="slick1">
        @foreach($products as $product)
            <div class="slide-item">
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
                                <img src="{{ url('image', $item->name) }}" class="img-div-phone lazy" alt="">
                                @break
                                @elseif($product->category->name=="Canvas Art")
                                <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                                @break
                                @elseif($product->category->name=="Wallpapers")

                                @if($item->position == "room")
                                <img src="{{ url('image', $item->name) }}" class="img-div-wallpapers" alt="{{$item->position}}">
                                @break
                                @endif
                                @elseif($product->category->name=="Notebooks")
                                <img src="{{ url('image', $item->name) }}" class="img-div-notebooks" alt="">
                                @break
                                @elseif($product->category->name=="Posters")
                                <img src="{{ url('image', $item->name) }}" class="img-div-wall" alt="">
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
                                <img  src="{{ url('images', $product->image) }}" class="" alt="">
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
                                    <p><span style="font-weight: bold">&euro;{{number_format((float)$product->price, 2)}}</span></p>
                                @else
                                    <p><span style="font-weight: bold">&euro;{{number_format((float)$product->spl_price, 2)}}</span></p>
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
</main>
<!--   About urban web   -->
@include('layouts.about_urban_web')
@include('layouts.subscribe')
@endsection
