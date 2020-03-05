@extends('layouts.master')

@section('content')
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

<section id="index-amazon">
    <div class="amazon">
        <div class="container">
            <div class="row">
                <div class="product" style="display:flex;">
                @foreach($Products as $product)
                    <div class="row">
                        <div class="thumbnail">
                            <img style="width:400px;height:400px" src="{{url('images', $product->image)}}" alt="" class="card-img"> <br>
                        </div>
                    </div>
                    <div class="col-md-offset-1" style="padding-left:50px;">
                        <div class="product_details">
                            <h2 class="product-title">
                                <?php echo ucwords($product->name); ?>
                            </h2>
                            <p>{{ $product->description}}</p>

                            <span id="price">
                            @if($product->spl_price==0)
                                <input type="hidden" value="<?php echo $product->price;?>">
                            <p><b>Price:</b> <span id="price">{{ $product->price}} </span>&euro;</p>
                            @else
                                <div class="d-flex justify-content-between align-items-center">
                                     <input type="hidden" value="<?php echo $product->spl_price;?>" name="newPrice">
                                    <p class="" style="text-decoration:line-through; color:#333">${{$product->price}}</p>
                                    <img src="" alt="..."  style="width:60px">
                                    <p class="">${{$product->spl_price}}</p>
                                </div>
                            @endif
                            </span>
                        <?php $sizes = DB::table('products_properties')->where('pro_id', $product->id)->get(); ?>
                            <select name="size" id="size">
                                @foreach($sizes as $size)
                                <option >{{$size->size}}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="<?php echo $product->id; ?>" id="proDum">
                            <br>
                            <br>
                            <button class="btn btn-primary btn-sm">
                                <a href="{{ url('/cart/addItem', [$product->id]) }}" class="add-to-cart" style="color:white;">Add to cart</a>
                            </button>
                            <?php
                                $wishData = DB::table('wishlist')->rightJoin('product', 'wishlist.pro_id', '=', 'product.id')->
                                                where('wishlist.pro_id', '=', $product->id)->get();
                                $count = App\Wishlist::where(['pro_id' => $product->id])->count();
                            ?>
                            <?php if($count == "0") { ?>

                                {!! Form::open(['route' => 'addToWishlist', 'method' => 'post']) !!}
                                <input type="hidden" value="{{$product->id}}" name="pro_id">
                                <br>
                                <input type="submit" value="Add to Wishlist" class="btn btn-primary">
                                {!! Form::close() !!}
                            <?php } else { ?>
                                <h3 style="color:green;">Alredy Added to wishlist
                                    <a href="{{ url('/wishlist') }}">wishlist</a>
                                </h3>
                            <?php } ?>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
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
   if (Auth::check()) {
    $userId = Auth::user()->id;
   }
    else {
          $userId=0;
}
      $counter = DB::table('users')->select('name' ,DB::raw('count(*) as total'))->join('orders', 'orders.user_id' , '=', 'users.id')
        ->join('order_product', 'orders.id','=','order_product.order_id')
        ->where('users.id', $userId)
        ->where('order_product.product_id', $product->id)
        ->groupBy('name')
        ->get(); ?>
        @foreach($counter as $c )
       
        @if($c->total>0)
    <div>
    
    <p><b>Write Your Review</b></p>
    <div style="display:flex;flex-direction:column;">
    <section class='rating-widget'>
  
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
    @endif
    @endforeach
    </div>
    @endforeach
</section>
@include('recommends')
@endsection
