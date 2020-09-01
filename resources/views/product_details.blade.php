@extends('layouts.master')

@section('meta')
  <meta property="og:title" content="URBANONE">
  <meta property="og:image" content="https://urbanone.me/image/{{$imageFront->name}}">
@endsection

@section('phone-css')
    <link rel="stylesheet" href="/css/product-details-phone.css">
@endsection

@section('content')
<div class="container-fluid">
  @include('modals.size_modal')
  @include('modals.view_size_guid_modal')
  @include('modals.reviews_modal')
  @include('modals.write_review_modal')

  <nav id="phone-nav" class="navbar navbar-expand-sm sticky-top navbar-light bg-light" style="padding: 10px;margin: 0 -15px;">
    <div style="display: flex;width: 100%;justify-content: space-between;align-items: center;">
        <div>
            @if($product->spl_price==0)
                <input class="product_price" type="hidden" value="{{$product->price}}">
                <h4 class="A3_price"><span>&euro; {{ $product->price}} </span></h4>
            @else
                <div class="d-flex justify-content-between align-items-center">
                  <input type="hidden" value="{{$product->spl_price}}" name="newPrice">
                  <p class="" style="text-decoration:line-through; color:#333">&euro;{{$product->price}}</p>
                  <p class="">&euro;{{$product->spl_price}}</p>
                </div>
            @endif
            @if($product->price_b2 != 0)
              <input type="hidden" class="product_b2_price" value="{{$product->price_b2}}" name="newPrice">
              <h4 class="B2_price"><span>&euro; {{ $product->price_b2}} </span></h4>
            @endif
            @if($product->price_b1 != 0)
              <input type="hidden" value="{{$product->price_b1}}" name="newPrice">
              <h4 class="B1_price"><span>&euro; {{ $product->price_b1}} </span></h4>
            @endif

          {{-- @if($product->spl_price==0)

              <p style="font-size: 20px;margin-bottom: 0;margin-left: 20px;" >{{ $product->price }}&euro;</p>
          @else
              <p style="font-size: 20px;margin-bottom: 0;margin-left: 20px;">{{ $product->spl_price }}&euro;</p>
          @endif --}}
        </div>
        <div style="width: 50%;">
         <a id="phone-add" style="cursor:pointer;">
            <div class="btn-add-to-cart" id="btn-add-to-cart-phone" style="width: inherit;">
              <p id="test-phone">Add to cart</p>
            </div>
          </a>
        </div>
    </div>
  </nav>

<!--   For Desktop -->
  <div class="row desctop-product">
    <div id="loading-overlay">
      <div class="loading-icon"></div>
  </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
        <div id="desctop-left">
     
          <input type="hidden" value="@if($imageFront){{$imageFront->color}}@endif" id="productColor" display="none" name="pro_color">
          <input type="hidden" value="{{$product->gender}}" id="productGender" display="none" name="pro_gender">
            <div style="width: 50%;margin: auto;">
                <img class="slika1" src="{{url('design', $design->name)}}">
            </div>
           
        <div>
            @if ($product->gender=="unisex" && $product->category_id == 6)
                <img id="blank-image"  class="slika2"  src="{{url('image',$imageBack)}}"> x
            @elseif(strpos($product->name, "case"))
                <img id="blank-image"   class="slika2" src="{{url('site-images',$imageBack)}}">
            @else
                <img id="blank-image"  class="slika2" src="{{url('site-images',$imageBack)}}">
            @endif
        </div>

        </div>
      </div>
      <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
        <div id="desctop-middle">
          @if ($pro_cat->category->name == 'Wallpapers')
          <div id="slick27">
            @foreach ($imageSlider as $item)
            <div class="slide-item">
              <img src="{{url('image', $item->name)}}">
            </div>
          
            @endforeach
             
          </div>
          @else    
            <img id="main-image" class="slika3"  src="{{url('image', $imageFront->name)}}">
          @endif
         
          <div class="wishlist">
            <?php
                  $wishData = DB::table('wishlist')
                                  ->rightJoin('product', 'wishlist.pro_id', '=', 'product.id')
                                  ->where('wishlist.pro_id', '=', $product->id)->get();
                // $count = App\Wishlist::where(['pro_id' => $product->id])->count();
                $count = 0;
                if(Auth::user()) {
                    $count = DB::table('wishlist')
                    ->join('product', 'product.id', '=', 'wishlist.pro_id')
                    ->where('wishlist.pro_id', '=', $product->id)
                    ->where('wishlist.user_id' ,'=' , Auth::user()->id)
                    ->count();
                }

              ?>
              <?php if($count == "0") { ?>

                  <input type="hidden" value="{{$product->id}}" id="productID" name="pro_id">
                  <br>
                  <input class="" type="submit" value=" " id="sendWishList">

              <?php } else { ?>
                <input type="submit" value=" " id="disable">
              <?php } ?>
          </div>
        </div>
    </div>
    <div class="slick-wrapper" id="phone-middle">
      <div class="wishlist-phone" style="display: none;">
        <?php
              $wishData = DB::table('wishlist')
                              ->rightJoin('product', 'wishlist.pro_id', '=', 'product.id')
                              ->where('wishlist.pro_id', '=', $product->id)->get();

             // $count = App\Wishlist::where(['pro_id' => $product->id])->count();
             $count = 0;
             if(Auth::user()) {
                $count = DB::table('wishlist')
                ->join('product', 'product.id', '=', 'wishlist.pro_id')
                ->where('wishlist.pro_id', '=', $product->id)
                ->where('wishlist.user_id' ,'=' , Auth::user()->id)
                ->count();
             }

          ?>
          <?php if($count == "0") { ?>

              <input type="hidden" value="{{$product->id}}" id="productID"  name="pro_id">
              <br>
              <input type="submit" value=" " id="phoneSendWishList">

          <?php } else { ?>
            <input type="submit" value=" " id="disable">
          <?php } ?>
      </div>

        <div id="slick8"    style=" display: none;">
            <div class="slide-item">
              <img src="{{url('design', $design->name)}}">
            </div>
            <div class="slide-item">
              <img id="main-image-mobile" src="{{url('image', $imageFront->name)}}">
            </div>
            <div class="slide-item">
              <img id="blank-image-mobile" src="{{url('image', $imageBack)}}">
            </div>
        </div>
    </div>
      <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12" style="background: #F5F5F5; height: 100vh" >
        <h4 class="product-title" style="padding-top: 20px;">{{ $product->name}}</h4>
       
        <input type="hidden" value="{{ $pro_cat->category->name }}" id="pro_cat">
          <h5>{{ $pro_cat->category->name }}</h5>
          <p>Designed by <strong>Urban One</strong></p>

          <span id="price">
            @if($product->spl_price==0)
                <input class="product_price" type="hidden" value="{{$product->price}}">
                <input class="db_price" type="hidden" value="{{$product->price}}">
                <h4 class="A3_price"><span style="font-weight: bold;font-size: 20px;" >&euro; {{ $product->price}} </span></h4>
            @else
                <div class="d-flex justify-content-between align-items-center" style="width:90%; margin-left: 0;">
                  <input type="hidden" value="{{$product->spl_price}}" name="newPrice">
                  <p class="" style="text-decoration:line-through; color:#333;font-weight: bold;font-size: 20px;">&euro;{{$product->price}}</p>
                  <p class="" style="font-weight: bold;font-size: 22px;">&euro;{{$product->spl_price}}</p>
                </div>
            @endif
            @if($product->price_b2 != 0)
              <input type="hidden" class="product_b2_price" value="{{$product->price_b2}}" name="newPrice">
              <h4 class="B2_price"><span>&euro; {{ $product->price_b2}} </span></h4>
            @endif
            @if($product->price_b1 != 0)
              <input type="hidden" value="{{$product->price_b1}}" name="newPrice">
              <h4 class="B1_price"><span>&euro; {{ $product->price_b1}} </span></h4>
            @endif
          </span>

          @if($pro_cat->category->name == "T-Shirts" || $pro_cat->category->name == "Polo Shirts" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodies & Sweatshirts")
          <input type="hidden" value="{{ $pro_cat->category->name }}" id="pro_cat">
          <div class="select-size">
            <h5>Size</h5>
              <label class="xs-size">
                  <input type="radio" name="size" id="xs" value="XS" class="size-class test">
                  <span>XS</span>
              </label>
              <label class="s-size">
                  <input type="radio" name="size" id='s' value="S" class="size-class test">
                  <span>S</span>
              </label>
              <label class="m-size">
                  <input type="radio" name="size" id="m" value="M" class="size-class test">
                  <span>M</span>
              </label>
              <label class="l-size">
                  <input type="radio" name="size" id='l' value="L" class="size-class test">
                  <span>L</span>
              </label>
              <label class="xl-size">
                  <input type="radio" name="size" id='xl' value="XL" class="size-class test">
                  <span>XL</span>
              </label>
              <label class="xxl-size">
                  <input type="radio" name="size" id="xxl" value="2XL" class="size-class test">
                  <span>2XL</span>
              </label>
          </div>

          <div class="select-color">
            <h5>Color</h5>
              <label class="white">
                <div class="black-border">
                  <input type="radio" name="color" value="white"  class="color-class" checked>
                  <span></span>
                </div>
              </label>
              <label class="black">
                <div  class="white-border">
                  <input type="radio" name="color" class="color-class" value="black" >
                  <span></span>
                </div>
            </label>
            <label class="red">
              <div class="black-border">
                <input type="radio" name="color" value="red"  class="color-class">
                <span></span>
              </div>
            </label>
            <label class="navy">
              <div  class="white-border">
                <input type="radio" name="color" class="color-class" value="navy" >
                <span></span>
              </div>
          </label>
          </div>

          <div class="print-location">
            <h5>Print location</h5>
              <label class="front">
                  <input type="radio" name="print" value="front" class="print-class" checked>
                  <span>Front</span>
              </label>
              <label class="back">
                  <input type="radio" name="print" value="back" class="print-class">
                  <span>Back</span>
              </label>
          </div>

          <div class="view-size-guid">
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guide</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
          </div>

          @elseif($pro_cat->category->name == "Samsung Cases")
          <div class="phone-model">
            <h5>Model</h5>
            <select class="cases" id="cases">
              <option value="Samsung Galaxy S20">Samsung Galaxy S20</option>
              <option value="Samsung Galaxy S20+">Samsung Galaxy S20+</option>
            </select>
          </div>

          <div class="case-style">
            <h5>Case style</h5>
            <select class="cases-style">
              <option value="transparent">Transparent</option>
              <option value="black">Black</option>
            </select>
          </div>

          @elseif($pro_cat->category->name == "Iphone Cases")
          <div class="phone-model">
            <h5>Model</h5>
            <select class="cases">
              <option value="iPhone XI Pro">iPhone XI Pro</option>
              <option value="iPhone XI Pro Plus">iPhone XI Pro Plus</option>
            </select>
          </div>

          <div class="case-style">
            <h5>Case style</h5>
            <select  class="cases-style" id='caseStyle'>
              <option value="Transparent">Transparent</option>
              <option value="Black">Black</option>
            </select>
          </div>

          @elseif($pro_cat->category->name == "Huawei Cases")
          <div class="phone-model">
            <h5>Model</h5>
            <select  class="cases" id=''>
              <option value="Huawei P20">Huawei P20</option>
            </select>
          </div>
          <div class="case-style">
            <h5>Case style</h5>
            <select  class="cases-style" id='caseStyle'>
              <option value="Transparent">Transparent</option>
              <option value="Black">Black</option>
            </select>
          </div>

          @elseif($pro_cat->category->name == "Custom")
            <div class="custom">
                <h6>Enter your phone model</h6>
                <input type="text" class="custom1" id="input-custom-phone">
                <button id="custom-phone-model">Save</button>
            </div>
            <div class="case-style">
              <h5>Case style</h5>
              <select  class="cases-style" id='caseStyle'>
                <option value="Transparent">Transparent</option>
                <option value="Black">Black</option>
              </select>
            </div>
          @elseif($pro_cat->category->name == "Posters")
          <div class="choose-size">
            <h5>Size</h5>
            <select class="poster-size" id='posters'>
              <option value="A3" data-price="{{ $product->price}}">A3</option>
              <option value="B1" data-price="{{ $product->price_b1}}">B1</option>
              <option value="B2" data-price="{{ $product->price_b2}}">B2</option>
            </select>
          </div>

           <div class="select-color">
            <h5>Frame Color</h5>
              <label class="white">
                <div class="black-border">
                  <input type="radio" name="color" value="white"  class="color-class" checked>
                  <span></span>
                </div>
              </label>
              <label class="black">
                <div  class="white-border">
                  <input type="radio" name="color" class="color-class" value="black" >
                  <span></span>
                </div>
            </label>
          </div>

          <div class="view-size-guid">
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
          </div>

          @elseif($pro_cat->category->name == "Wallpapers")
            <div class="custom">
                <h6>Enter your wallpaper width (in meters)</h6>
                <input type="text" id="wallpaper-custom-width" class="custom-width" placeholder="e.g. 100"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                <h6>Enter your wallpaper height (in meters)</h6>
                <input type="text" id="wallpaper-custom-height" class="custom-height" placeholder="e.g. 80"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                <button id='save-wallpaper-size'>Save</button>
            </div>

            <div class="view-size-guid">
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
            </div>

            @elseif($pro_cat->category->name == "Canvas Art")
            <div class="choose-size">
              <h5>Size</h5>
              <select class="picture-size" id='picture'>
                <option value="B2" data-price={{$product->price_b2}}>B2</option>
                <option value="B1"  data-price={{$product->price_b1}}>B1</option>
                <option id="custom-option" value="custom"  data-price={{$product->price}}>Custom</option>
              </select>
            </div>

            <div id='picture-custom' class="custom">
                <h6>Enter your picture width</h6>
                <input type="text" id="picture-custom-width" class="custom-width" placeholder="e.g. 100" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                <h6>Enter your picture height</h6>
                <input type="text" id="picture-custom-height" class="custom-height" placeholder="e.g. 80"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
                <button id='save-picture-size'>Save</button>
            </div>

            <div class="view-size-guid">
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
            </div>

            @elseif($pro_cat->category->name == "Tapete")
            <div class="custom">
                  <h6>Enter width:</h6>
                  <input type="text" id="width" placeholder="e.g  5">
              </div>
              <div class="custom">
                  <h6>Enter height:</h6>
                  <input type="text" id="height" placeholder="e.g  6">
              </div>
            @elseif($pro_cat->category->name == "Thermoses")
              <div class="select-color">
                <h5>Color</h5>
                  <label class="black">
                    <div class="white-border-thermos">
                      <input type="radio" name="color" class="color-class" value="black" checked >
                      <span></span>
                    </div>
                </label>
              </div>
            @elseif($pro_cat->category->name == "Tote Bags")
            <div class="select-color">
              <h5>Color</h5>
              <label class="white whiteBlack">
                <div class="black-border">
                  <input type="radio" name="color" class="kids-color-class" value="Black"checked>
                  <span style=" background: linear-gradient( -45deg, rgb(245, 240, 242), rgb(247, 243, 245) 49%, white 49%, rgb(10, 9, 9) 51%, rgb(12, 5, 10) 51% );"></span>
                </div>
            </label>
                <label class="white whiteRed" >
                  <div class="black-border">
                    <input type="radio" name="color" value="Red"  class="kids-color-class" >
                    <span style=" background: linear-gradient( -45deg, rgb(248, 28, 28), rgb(245, 31, 31) 49%, white 49%, white 51%, rgb(253, 251, 251) 51% );"></span>
                  </div>
                </label>
            </div>

            @elseif($pro_cat->category->name == "Clocks")
            <div class="select-color">
              <h5>Color</h5>
              <label class="black">
                <div  class="white-border">
                  <input type="radio" name="color" class="color-class" value="black" checked>
                  <span></span>
                </div>
            </label>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" >
                    <span></span>
                  </div>
                </label>

            </div>
            @elseif($pro_cat->category->name == "Mugs")
            <div class="select-color">
              <h5>Color</h5>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" checked>
                    <span></span>
                  </div>
                </label>
                <label class="neon">
                  <div class="black-border">
                    <input type="radio" name="color" class="color-class" value="neon" >
                    <span></span>
                  </div>
              </label>
            </div>
            @elseif($pro_cat->category->name == "Backpacks")
            <div class="select-color">
              <h5>Color</h5>
                <label class="black">
                    <div  class="white-border">
                      <input type="radio" name="color" class="color-class" value="black" checked >
                      <span></span>
                    </div>
                </label>
                <label class="red">
                  <div class="black-border">
                    <input type="radio" name="color" value="red"  class="color-class">
                    <span></span>
                  </div>
                </label>
            </div>
            @elseif($pro_cat->category->name == "Magnets")
            <div class="choose-size">
              <h5>Shape</h5>
              <select class="magnet-shape" id=''>
                <option value="Square">Squared</option>
                <option value="Rounded">Rounded</option>
              </select>
            </div>
            @elseif($pro_cat->category->name == "Coasters")
            <div class="choose-size">
              <h5>Shape</h5>
              <select class="coaster-shape" id=''>
                <option value="Square">Squared</option>
                <option value="Rounded">Rounded</option>
              </select>
            </div>
            <div class="choose-size">
              <h5>Design</h5>
              <select class="coaster-design" id=''>
                <option value="Design">Design</option>
                <option value="Engraving">Engraving</option>
              </select>
            </div>
            @elseif($pro_cat->category->name == "Bottle Openers")
            <div class="choose-size">
              <h5>Material</h5>
              <select class="material" id=''>
                <option value="Timber">Timber</option>
              </select>
            </div>
            <div class="choose-size">
              <h5>Design</h5>
              <select class="opener-design" id=''>
                <option value="Design">Design</option>
                <option value="Engraving">Engraving</option>
              </select>
            </div>

            @elseif($pro_cat->category->name == "Kids T-Shirts" )
            <div class="select-size">
              <h5>Size</h5>
                <label class="size2">
                    <input type="radio" name="kids-size" id="s2" value="2" class="kids-size-class">
                    <span>2</span>
                </label>
                <label class="size4">
                    <input type="radio" name="kids-size" id="s4" value="4" class="kids-size-class">
                    <span>4</span>
                </label>
                <label class="size6">
                    <input type="radio" name="kids-size" id="s6" value="6" class="kids-size-class">
                    <span>6</span>
                </label>
                <label class="size8">
                    <input type="radio" name="kids-size" id="s8" value="8" class="kids-size-class">
                    <span>8</span>
                </label>
                <label class="size10">
                    <input type="radio" name="kids-size" id="s10" value="10" class="kids-size-class">
                    <span>10</span>
                </label>
                <label class="size12">
                    <input type="radio" name="kids-size" id="s12" value="12" class="kids-size-class">
                    <span>12</span>
                </label>
            </div>

            <div class="select-color">
              <h5>Color</h5>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="kids-color-class" checked>
                    <span></span>
                  </div>
                </label>
              {{--   <label class="pink">
                  <div class="black-border">
                    <input type="radio" name="color" class="kids-color-class" value="pink" >
                    <span></span>
                  </div>
              </label>
              <label class="blue">
                <div  class="black-border">
                  <input type="radio" name="color" class="kids-color-class" value="blue" >
                  <span></span>
                </div>
            </label> --}}
            </div>

            <div class="print-location">
              <h5>Print location</h5>
                <label class="front">
                    <input type="radio" name="print" value="front" class="print-class" checked>
                    <span>Front</span>
                </label>
                <label class="back">
                    <input type="radio" name="print" value="back" class="print-class">
                    <span>Back</span>
                </label>
            </div>

            <div class="view-size-guid">
                <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
                <img src="/site-images/Layer_1_1_.svg" alt="">
            </div>

          @elseif($pro_cat->category->name == "Kids One-Pieces" )
          <div class="select-size">
            <h5>Size</h5>
              <label class="size2" style="width: 40px;height: 37px;">
                  <input type="radio" name="kids-size" id="s2" value="0-12" class="kids-size-class" checked>
                  <span style="padding-left: 5px;padding-top: 5px;">0-12</span>
              </label>
          </div>

          <div class="select-color">
            <h5>Color</h5>
              <label class="white">
                <div class="black-border">
                  <input type="radio" name="color" value="white"  class="kids-color-class" checked>
                  <span></span>
                </div>
              </label>
          </div>

          <div class="print-location">
            <h5>Print location</h5>
              <label class="front">
                  <input type="radio" name="print" value="front" class="print-class" checked>
                  <span>Front</span>
              </label>
              <label class="back">
                  <input type="radio" name="print" value="back" class="print-class">
                  <span>Back</span>
              </label>
          </div>
          @elseif($pro_cat->category->name == "Kids Bibs" )
          <div class="select-size">
            <h5>Size</h5>
              <label class="size2">
                  <input type="radio" name="kids-size" id="s2" value="UNI" class="kids-size-class" checked>
                  <span style="padding-left: 4px;">Uni</span>
              </label>
          </div>

          <div class="select-color">
            <h5>Color</h5>
              <label class="white whiteBlue" >
                <div class="black-border">
                  <input type="radio" name="color" value="white and blue"  class="kids-color-class" checked>
                  <span style=" background: linear-gradient( -45deg, blue, blue 49%, white 49%, white 51%, rgb(253, 251, 251) 51% );"></span>
                </div>
              </label>
              <label class="white whitePink">
                <div class="black-border">
                  <input type="radio" name="color" class="kids-color-class" value="white and pink" >
                  <span style=" background: linear-gradient( -45deg, rgb(245, 240, 242), rgb(247, 243, 245) 49%, white 49%, white 51%, rgb(255, 138, 216) 51% );"></span>
                </div>
            </label>
          </div>
          @elseif($pro_cat->category->name == "Towels")
            <div class="choose-size">
              <h5>Size</h5>
              <select class="picture-size" id='towels'>
                <option value="100x150">100x150</option>
                <option value="50x100">50x100</option>
              </select>
            </div>
            <div class="select-color">
              <h5>Color</h5>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" checked>
                    <span></span>
                  </div>
                </label>
                <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>
              </label>
            </div>
            @elseif($pro_cat->category->name == "Notebooks")
            <div class="select-color">
              <h5>Color</h5>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" checked>
                    <span></span>
                  </div>
                </label>
                <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>
              </label>
            </div>
            @elseif($pro_cat->category->name == "Masks")
            <div class="mask-model">
              <h5>Print location</h5>
              <select class="masks" id="cases">
                <option value="One side printed">One side printed</option>
                <option value="Both sides printed">Both sides printed</option>
              </select>
            </div>
            <div class="select-color">
              <h5>Color</h5>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" checked>
                    <span></span>
                  </div>
                </label>
                <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>
              </label>
            </div>
            @elseif($pro_cat->category->name == "Gift Bags")
            <div class="sack-model">
              <h5>Choose Sack Model</h5>
              <select class="sacks" id="gift">
                <option value="Shape Two">Shape Two</option>
                <option value="Shape One">Shape One</option>
              </select>
            </div>
            <div class="select-color">
              <h5>Color</h5>
                <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" checked>
                    <span></span>
                  </div>
                </label>
                <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>
              </label>
            </div>
            @elseif($pro_cat->category->name == "Makeup Bags")
            <div class="select-color">
              <h5>Color</h5>
              {{--   <label class="white">
                  <div class="black-border">
                    <input type="radio" name="color" value="white"  class="color-class" checked>
                    <span></span>
                  </div>
                </label> --}}
                <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black"  checked>
                    <span></span>
                  </div>
              </label>
              <label class="red">
                <div  class="white-border">
                  <input type="radio" name="color" class="color-class" value="red"  checked>
                  <span></span>
                </div>
            </label>
            <label class="pink">
              <div  class="white-border">
                <input type="radio" name="color" class="color-class" value="pink"  checked>
                <span></span>
              </div>
          </label>
            </div>


          @else
          <button style="display:none"></button>
          @endif
          <input type="hidden" value="<?php echo $product->id; ?>" id="proDum">

          <a id="add" style="cursor:pointer;">
            <div class="btn-add-to-cart" id="btn-add-to-cart">
              <p id="test">Add to cart</p>
            </div>
          </a>

          <div class="delivery">
            <div>
              <h5>Delivery</h5>
              <img src="/site-images/iconfinder_173_Ensign_Flag_Nation_montenegro_2634361.svg" alt="">
            </div>
            <p>2-5 working days</p>
          </div>

          @if( isset($counter) && $counter->total>0 && $createReview === null)
              <!-- Button trigger modal -->
            <button type="button" id="review" data-toggle="modal" data-target="#writeReviewModal">
              Write your review
            </button>
          @endif
        </div>
    </div>


 <!--   Displaying reviews -->
      @if(isset($review))
        <div class="display-review">
            <div class="average-review">
              <h5>Reviews</h5>
              <div>
                  <div class="rateyo"
                      data-rateyo-rating="{{ $average }}"
                      data-rateyo-num-stars="5">
                  </div>
              </div>
              <p>Average review for this <br> product is {{$average}}</p>
            </div>
            <div class="latest-review">
                <h5>Lates review</h5>
                <div>
                  <div class="rateyoo"
                  data-rateyo-rating="{{ $review->stars }}"
                  data-rateyo-num-stars="5">
              </div>
              </div>
                <p><strong>{{$review->review_title}}</strong>
                  <br>
                  <span> by {{$review->person_name}}, on {{date('F j, Y', strtotime($review->created_at))}} </span>
                </p>
                <p>{{$review->review_content}}</p>
                <a href=""  data-toggle="modal" data-target="#reviews-modal">+ Read all reviews</a>
            </div>
        </div>
      @endif

</div>
@include('recommends')
@include('layouts.about_urban_web')
@include('layouts.subscribe')


@endsection

@section('rateYo')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
  <script>
    
    function validateForm()
    {
        // Validate URL
        var stars = $("#starsVal").val();
        if (stars == "") { 
            alert("Plese review this product by selectin a star.");
            return false;
        }
      return true;
    }
  </script>
@endsection
