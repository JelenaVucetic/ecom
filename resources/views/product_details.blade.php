@extends('layouts.master')

@section('content')
  <div class="container-fluid">
  @include('modals.size_modal')
  @include('modals.view_size_guid_modal')
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
           <!--   <a id="phone-add" style="cursor:pointer;"> 
              <div class="btn-add-to-cart" id="btn-add-to-cart" style="width: inherit;">
                <p id="test">Add to cart</p>
              </div>
            </a>   -->
          </div>
      </div>
    </nav>


      <div class="slick-wrapper">
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
</div>
<!-- end for phone -->

  <!--   For Desctop -->
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
                {!! Form::open(['route' => 'addToWishlist', 'method' => 'post']) !!}
                <input type="hidden" value="{{$product->id}}" name="pro_id">
                <br>
                <input type="submit" value=" ">
                {!! Form::close() !!}
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
                <input type="hidden" value="<?php echo $product->price;?>">
                <h4><span id="price">&euro; {{ $product->price}} </span></h4>
            @else
                <div class="d-flex justify-content-between align-items-center">
                  <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice">
                  <p class="" style="text-decoration:line-through; color:#333">&euro;{{$product->price}}</p>
                  <p class="">&euro;{{$product->spl_price}}</p>
                </div>
            @endif
          </span>

          @if($pro_cat->category->name == "Urban clothing" || $pro_cat->category->name == "T-shirt" || $pro_cat->category->name == "Polo Shirt" || $pro_cat->category->name == "Tank Tops" || $pro_cat->category->name == "Hoodie & Sweatshirts" || $pro_cat->category->name == "Hoodie & Sweatshirts")
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
                  <div class="black-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>               
              </label>
              <label class="white">
                  <input type="radio" name="color" value="white"  class="color-class" checked>
                  <span></span>
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
            <h5>Frame color</h5>
              <label class="black">
                  <div class="black-border">
                    <input type="radio" name="color" class="color-class" value="black" >
                    <span></span>
                  </div>               
              </label>
              <label class="white">
                  <input type="radio" name="color" value="white"  class="color-class" checked>
                  <span></span>
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
        </div>
    </div>


 <!--   Displaying reviews -->
    <?php $reviews = DB::table('reviews')->where('product_id', $product->id)->get(); ?>
        @foreach($reviews as $review)
          <ul>
            <li>{{$review->review_title}}</li>
            <li>{{$review->person_name}}</li>
            <li>{{date('F j, Y', strtotime($review->created_at))}}, {{date('H: i', strtotime($review->created_at))}}</li>
          </ul>
          <p>{{$review->review_content}}</p>
        @endforeach
    <?php 
   if(Auth::check()) {
    $userId = Auth::user()->id;
    $counter = DB::table('users')->select('name' ,DB::raw('count(*) as total'))
          ->join('orders', 'orders.user_id' , '=', 'users.id')
          ->join('order_product', 'orders.id','=','order_product.order_id')
          ->where('users.id', $userId)
          ->where('order_product.product_id', $product->id)
          ->groupBy('name')
          ->first(); 
      if( isset($counter) && $counter->total>0){
    ?>
       
  <div>

<!--   Rating section -->
<section class='rating-widget'>
  <h3>Write Your Review</h3>
    <!-- Rating Stars Box -->
    <div class='rating-stars'>
      <ul id='stars'>
        <li class='star' title='Poor' data-value='1'>
          <i class='fa fa-star fa-fw'></i>
        </li>
        <li class='star' title='Fair' data-value='2'>
          <i class='fa fa-star fa-fw'></i>
        </li>
        <li class='star' title='Good' data-value='3'>
          <i class='fa fa-star fa-fw'></i>
        </li>
        <li class='star' title='Excellent' data-value='4'>
          <i class='fa fa-star fa-fw'></i>
        </li>
        <li class='star' title='WOW!!!' data-value='5'>
          <i class='fa fa-star fa-fw'></i>
        </li>
      </ul>
    </div>
  
  <div class='success-box'>
    <div class='clearfix'></div>
    <img alt='tick image'style="width:30px" src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
    <div class='text-message'></div>
    <div class='clearfix'></div>
  </div>
  <input type='hidden' id="user_id"  value="<?php echo  $userId ?>">
            
        <form action="{{url('/addReview')}}" method="post">

        {{ csrf_field() }}
            <span>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="text" name="person_name" placeholder="Your Name"/>
                <span style="color:red">{{ $errors->first('person_name') }}</span>     
                <input type="text", name="review_title" placeholder="Title"/>
                <span style="color:red">{{ $errors->first('review_title') }}</span> 
            </span><br>
            <textarea name="review_content" ></textarea> 
            <span style="color:red">{{ $errors->first('review_content') }}</span> 
            <br>
            <b>Rating: </b>  <br>
            <button type="submit" class="btn btn-success">
                Submit
            </button>
        </form>
    </div>
    </div>
  <?php }} ?>
</div>
@include('recommends')
@include('layouts.about_urban_web')
@include('layouts.subscribe')
@endsection
