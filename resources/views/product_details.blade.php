@extends('layouts.master')

@section('content')
<script>
function addToCartAjax(size, color, print) {
  var proDum = $('#proDum').val();
  $.ajax({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
      type: 'post',
      dataType: 'html',
      url: '/cart/addItem/' + proDum,
      data: {
        size: size,
        color: color,
        print: print
      },
      success: function(response) {
          console.log('gajo')
      }
  });
}

</script>
<script>
     $(document).ready(function(){
        $('#add').on('click', function(){
            var size = $('.size-class:checked').val();
            var color = $('.color-class:checked').val();
            var print = $('.print-class:checked').val();
            $('#btn-add-to-cart').removeAttr('data-toggle');
            $('#btn-add-to-cart').removeAttr('data-target');
            var pro_cat = $('#pro_cat').val();
            if((pro_cat == "T-shirt" && size == null) || (pro_cat == "Polo Shirt" && size == null) || (pro_cat == "Tank Tops" && size == null ) || (pro_cat == "Hoodie & Sweatshirts" && size == null)) {
              $('#btn-add-to-cart').attr('data-toggle', 'modal');
              $('#btn-add-to-cart').attr('data-target', '#exampleModal');
            } else {
                addToCartAjax(size, color, print);
              }  
          }); 
    }); 
</script>
<script>
     $(document).ready(function(){
        $('#modal-add').on('click', function(){
            var size = $('.size-modal:checked').val();
            var color = $('.color-class:checked').val();
            var print = $('.print-class:checked').val();
           if(size != null) {
            addToCartAjax(size, color, print);
           }
           else {
                alert('Please choose a size');
              }  
          }); 
    }); 
</script>
<script>
    $(document).ready(function(){
        $('#size').change(function(){
            var size = $('#size').val();
            var proDum = $('#proDum').val();
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '<?php echo url('/selectSize'); ?>',
                data: "size=" + size + "& proDum=" + proDum,
                success: function(response) {
                    console.log(response)
                }
            });
        });
    });
</script>
<script>
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
    var proDum = $('#proDum').val();
    var userId = $('#user_id').val()

    $.ajax({
        headers: {  
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
                } ,
      type: 'post',
      dataType: 'html',
      url: '<?php echo url('/addStar'); ?>',
      data: { value:ratingValue, product_id: proDum, user_id: userId},
      success: function(response) {
          console.log(response)
      }
  });
    
  });
});

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>


  <div class="container-fluid">
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
        <?php
            $pro_cat = App\Product::find($product->id);
            if($pro_cat->category != null){
        ?>
            <h5>{{ $pro_cat->category->name }}</h5>
        <?php } ?>
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
              <label class="s-size">
                  <input type="radio" name="size" id='s' value="S" class="size-class">
                  <span>S</span>
              </label>
              <label class="m-size">
                  <input type="radio" name="size" id="m" value="M" class="size-class">
                  <span>M</span>
              </label>
              <label class="l-size">
                  <input type="radio" name="size" id='l' value="L" class="size-class">
                  <span>L</span>
              </label>
              <label class="xl-size">
                  <input type="radio" name="size" id='xl' value="XL" class="size-class">
                  <span>XL</span>
              </label>
              <label class="xxl-size">
                  <input type="radio" name="size" id="xxl" value="2XL" class="size-class">
                  <span>2XL</span>
              </label>
              <label class="xxxl-size">
                  <input type="radio" name="size" id="xxxl" value="3XL" class="size-class">
                  <span>3XL</span>
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
          @elseif($pro_cat->category->name == "Cases" || $pro_cat->category->name == "Samsung Cases" || $pro_cat->category->name == "Iphone Cases" || $pro_cat->category->name == "Huawei Cases")
          <div class="phone-model">
            <h5>Model</h5>
            <select name="" id='phoneSelect'>
              <option value="Iphone 11">Iphone 11</option>
              <option value="Samsung s11">Samsung s11</option>
              <option value="Huaweii p20">Huaweii p20</option>
              <option value="Universal">Universal</option>
          </select>
          </div>

          <div class="case-style">
            <h5>Case style</h5>
            <select name="" id='caseStyle'>
              <option value="Transparent">Transparent</option>
              <option value="Transparent">Black</option>
          </select>
          </div>
         
          @else 
          <button></button>
          @endif
          <input type="hidden" value="<?php echo $product->id; ?>" id="proDum">

         <!--  <a href="{{ url('/cart/addItem', [$product->id]) }}">  -->
          <a id="add" style="cursor:pointer;"> 
            <div class="btn-add-to-cart" id="btn-add-to-cart">
              <p>Add to cart</p>
            </div>
          </a>

          <div id="my-modal-form" >
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please choose a size</h5>
                  </div>
                  <div class="modal-body">
                  <div class="select-size">
                      <h5>Size</h5>
                        <label class="s-size">
                            <input type="radio" name="size" id='s' value="S" class="size-modal">
                            <span>S</span>
                        </label>
                        <label class="m-size">
                            <input type="radio" name="size" id="m" value="M" class="size-modal">
                            <span>M</span>
                        </label>
                        <label class="l-size">
                            <input type="radio" name="size" id='l' value="L" class="size-modal">
                            <span>L</span>
                        </label>
                        <label class="xl-size">
                            <input type="radio" name="size" id='xl' value="XL" class="size-modal">
                            <span>XL</span>
                        </label>
                        <label class="xxl-size">
                            <input type="radio" name="size" id="xxl" value="2XL" class="size-modal">
                            <span>2XL</span>
                        </label>
                        <label class="xxxl-size">
                            <input type="radio" name="size" id="xxxl" value="3XL" class="size-modal">
                            <span>3XL</span>
                        </label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <a id="modal-add" style="cursor:pointer;"> 
                      <div id="btn-add-to-cart">
                        <p>Add to cart</p>
                      </div>
                    </a>
                    <p>
                    Returns are free and easy. <br>
                    Because you need to be happy. We all do.
                    </p>
                </div>
              </div>
            </div>
          </div>

          <div class="view-size-guid">
              <a href=""> <h5> View size guid</h5></a>
              <img src="/site-images/Layer_1_1_.svg" alt="">
          </div>

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
    <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
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
@endsection
