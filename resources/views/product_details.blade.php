@extends('layouts.master')

@section('phone-css')
    <link rel="stylesheet" href="/css/product-details-phone.css">
@endsection

@section('content')
<div class="container-fluid">
  @include('modals.size_modal')
  @include('modals.view_size_guid_modal')
  @include('modals.reviews_modal')
  @include('modals.write_review_modal')


<!--  For Phone -->

<div class="phone-product">
   <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light" style="padding: 10px;margin: 0 -15px;">
      <div style="display: flex;width: 100%;justify-content: space-between;align-items: center;">
          <div>
            @if($product->spl_price==0)
                <p style="font-size: 20px;margin-bottom: 0;margin-left: 20px;" >{{ $product->price }}&euro;</p>
            @else
                <p style="font-size: 20px;margin-bottom: 0;margin-left: 20px;">{{ $product->spl_price }}&euro;</p>
            @endif
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


      <div class="slick-wrapper">

        <div class="wishlist-phone">
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
               
                <input type="hidden" value="{{$product->id}}" name="pro_id">
                <br>
                <input type="submit" value=" " >
                
            <?php } else { ?>
              <input type="submit" value=" " id="disable">
            <?php } ?>
        </div>

          <div id="slick8">
              <div class="slide-item">
                <img src="{{url('design', $design->name)}}"> 
              </div>
              <div class="slide-item">
                <img src="{{url('images', $product->image)}}"> 
              </div>
              <div class="slide-item">
                <img src="{{url('images', $product->image)}}"> 
              </div>
          </div>
      </div>
      <div class="delivery">
        <div>
          <h5>Delivery</h5>
          <img src="/site-images/iconfinder_173_Ensign_Flag_Nation_montenegro_2634361.svg" alt="">
        </div>
        <p>Post Express by 24 April</p>
        <p>Standard 24 - 28 April</p>
      </div>    

      <?php $pro_cat = App\Product::find($product->id); ?>
      @if($pro_cat->category->name == "Urban clothing" || $pro_cat->category->name == "T-shirts" || $pro_cat->category->name == "Polo Shirts" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodie & Sweatshirts" || $pro_cat->category->name == "Hoodie & Sweatshirts")
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
          <label class="black">
              <div  class="white-border">
                <input type="radio" name="color" class="color-class" value="black" >
                <span></span>
              </div>               
          </label>
          <label class="white">
            <div class="black-border">
              <input type="radio" name="color" value="white"  class="color-class" checked>
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
          <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
          <img src="/site-images/Layer_1_1_.svg" alt="">
      </div>

      @elseif($pro_cat->category->name == "Samsung Cases")
      <div class="phone-model">
        <h5>Model</h5>
        <select class="cases" id='samsung'>
          <option value="Samsung Galaxy S20">Samsung Galaxy S20</option>
          <option value="Samsung Galaxy S20+">Samsung Galaxy S20+</option>
        </select>
      </div>

      <div class="case-style">
        <h5>Case style</h5>
        <select class="cases-style" id=''>
          <option value="Transparent">Transparent</option>
          <option value="Black">Black</option>
        </select>
      </div>
      @elseif($pro_cat->category->name == "Iphone Cases")
      <div class="phone-model">
        <h5>Model</h5>
        <select class="cases" id=''>
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
            <input type="text" id="custom">
        </div>
      @elseif($pro_cat->category->name == "Posters")
      <div class="choose-size">
        <h5>Size</h5>
        <select class="poster-size" id='posters'>
          <option value="A3">A3</option>
          <option value="B1">B1</option>
          <option value="B2">B2</option>
        </select>
      </div>
      <div class="select-color">
        <h5>Color</h5>
          <label class="black">
              <div  class="white-border">
                <input type="radio" name="color" class="color-class" value="black" >
                <span></span>
              </div>               
          </label>
          <label class="white">
            <div class="black-border">
              <input type="radio" name="color" value="white"  class="color-class" checked>
              <span></span>
            </div>    
          </label>
      </div>

      <div class="view-size-guid">
          <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
          <img src="/site-images/Layer_1_1_.svg" alt="">
      </div>
      @elseif($pro_cat->category->name == "Wallpaper")
        <div class="custom">
            <h6>Enter your wallpaper size</h6>
            <input type="text" id="wallpaper">
        </div>

        <div class="view-size-guid">
          <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
          <img src="/site-images/Layer_1_1_.svg" alt="">
        </div>

        @elseif($pro_cat->category->name == "Pictures")
        <div class="choose-size">
          <h5>Size</h5>
          <select class="picture-size" id='picture'>
            <option value="B2">B2</option>
            <option value="B1">B1</option>
            <option value="custom">Custom</option>
          </select>
        </div>

        <div id='picture-custom' class="custom">
            <h6>Enter your picture size</h6>
            <input type="text" id="picture">
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
      @else 
      <button></button>
      @endif

      @if (isset($review))

      <a href="" class="display-review-link" data-toggle="modal" data-target="#reviews-modal">
        <div class="display-review-phone">
          <img src="/site-images/about-right-arrow.png" alt="">
          <div>
            {{ $numberOfReviews }} Reviews
          </div>
          <div style="display: flex;">
            <p style="margin-bottom:0;">{{$average}}</p>
            <div class="rateyoPhone"
                data-rateyo-rating="{{ $average }}"
                data-rateyo-num-stars="5">
            </div>
          </div>
        </div>
      </a>
      @endif
      

      @if( isset($counter) && $counter->total>0 && $createReview === null)

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#writeReviewModal">
          Write your review
        </button> 
      @endif

</div>
<!-- end for phone -->

<!--   For Desktop -->
  <div class="row desctop-product">
      <div class="col-3 left">
        <img style="width:50%"  src="{{url('design', $design->name)}}"> 
        <img src="{{url('images', $product->image)}}"> 
      </div>
      <div class="col-6 middle">
        <img src="{{url('images', $product->image)}}">
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
      <div class="col-3 right">
        <h4 class="product-title">{{ $product->name}}</h4>
        <?php $pro_cat = App\Product::find($product->id); ?>
        <input type="hidden" value="{{ $pro_cat->category->name }}" id="pro_cat">
          <h5>{{ $pro_cat->category->name }}</h5>
          <p>Designed by <strong>Urban One</strong></p>

          <span id="price">
            @if($product->spl_price==0)
                <input id="product_price" type="hidden" value="<?php echo $product->price;?>">
                <h4><span>&euro; {{ $product->price}} </span></h4>
            @else
                <div class="d-flex justify-content-between align-items-center">
                  <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice">
                  <p class="" style="text-decoration:line-through; color:#333">&euro;{{$product->price}}</p>
                  <p class="">&euro;{{$product->spl_price}}</p>
                </div>
            @endif
          </span>

          @if($pro_cat->category->name == "Urban clothing" || $pro_cat->category->name == "T-shirts" || $pro_cat->category->name == "Polo Shirts" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodie & Sweatshirts" || $pro_cat->category->name == "Hoodie & Sweatshirts")
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
              <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>               
              </label>
              <label class="white">
                <div class="black-border">
                  <input type="radio" name="color" value="white"  class="color-class" checked>
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
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
          </div>

          @elseif($pro_cat->category->name == "Samsung Cases")
          <div class="phone-model">
            <h5>Model</h5>
            <select class="cases" id='samsung'>
              <option value="Samsung Galaxy S20">Samsung Galaxy S20</option>
              <option value="Samsung Galaxy S20+">Samsung Galaxy S20+</option>
            </select>
          </div>

          <div class="case-style">
            <h5>Case style</h5>
            <select class="cases-style" id=''>
              <option value="Transparent">Transparent</option>
              <option value="Black">Black</option>
            </select>
          </div>
          @elseif($pro_cat->category->name == "Iphone Cases")
          <div class="phone-model">
            <h5>Model</h5>
            <select class="cases" id=''>
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
                <input type="text" id="custom">
            </div>
          @elseif($pro_cat->category->name == "Posters")
          <div class="choose-size">
            <h5>Size</h5>
            <select class="poster-size" id='posters'>
              <option value="A3">A3</option>
              <option value="B1">B1</option>
              <option value="B2">B2</option>
            </select>
          </div>

           <div class="select-color">
            <h5>Color</h5>
              <label class="black">
                  <div  class="white-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>               
              </label>
              <label class="white">
                <div class="black-border">
                  <input type="radio" name="color" value="white"  class="color-class" checked>
                  <span></span>
                </div>    
              </label>
          </div>

          <div class="view-size-guid">
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
          </div>

          @elseif($pro_cat->category->name == "Wallpaper")
            <div class="custom">
                <h6>Enter your wallpaper size</h6>
                <input type="text" id="wallpaper">
            </div>

            <div class="view-size-guid">
              <a href="" data-toggle="modal" data-target="#myModal"> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
            </div>

            @elseif($pro_cat->category->name == "Pictures")
            <div class="choose-size">
              <h5>Size</h5>
              <select class="picture-size" id='picture'>
                <option value="B2">B2</option>
                <option value="B1">B1</option>
                <option value="custom">Custom</option>
              </select>
            </div>

            <div id='picture-custom' class="custom">
                <h6>Enter your picture size</h6>
                <input type="text" id="picture">
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
          @else 
          <button></button>
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
            <p>Post Express by 24 April</p>
            <p>Standard 24 - 28 April</p>
          </div>   

          @if( isset($counter) && $counter->total>0 && $createReview === null)
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#writeReviewModal">
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
                <p>star icons </p>
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

@endsection
