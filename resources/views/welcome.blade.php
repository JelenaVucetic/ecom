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
                <div class="box-container">
                    <div class="box1-img-holder"></div>
                    <button><a href="{{route('category.show',[ $shirtsCat->id, $shirtsCat->name => $shirtsCat->parent_id ])}}" style="color: inherit;">  Shop T-Shirts</a></button>
                </div>
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
                <a href="{{route('category.show',[ $picturesCat->id, $picturesCat->name => $picturesCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box3-img-holder"></div>
                        <button>Shop Canvas Art</button>
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
                    <img id="female" src="/site-images/217-Female.svg">
                    <button>Gifts for Her</button>
                </div>
            </a>
        </div>
    </div>

  <!--   Accessories -->

    <div class="">
        <div class="accessories">
            <p>Accessories</p>
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
                <a href="{{route('category.show',[$notebooksCat->id, $notebooksCat->name => $notebooksCat->parent_id ])}}" style="color: inherit;">
                    <div class="box-container">
                        <div class="box9-img-holder"></div>
                        <button>Notebooks</button>
                    </div>
                </a>
            </div>
        </div>
    </div>


    <div>



    </div>

    <div class="container products-title" style="padding-left: 0">
        <h3 style="color: #404040;font-size: 27px;font-weight: bold;">Newest products</h3>
    </div>
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
                              <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                              @break
                              @elseif($product->category->name=="Pictures")
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
