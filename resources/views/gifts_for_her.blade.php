@extends('layouts.master')

@section('slick.css')
<link rel="stylesheet" href="/css/slick.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="design-for-you">
      <h2>T-Shirts</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick17">
        @foreach ($shirts as $shirt)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$shirt->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($shirt->images)
                  @foreach ($shirt->images as $item)
                  @if($shirt->category->name=="T-Shirts")
                    @if ($item->color == "white" && $item->position == "front")
                      <img src="{{ url('image', $item->name) }}" class="" alt="">
                      @break
                    @endif                    
                  @else
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                  @endif
                  @endforeach

                     @else
                      <img src="{{ url('images', $shirt->image) }}" class="" alt="">
                      @break
                      @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $shirt->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($shirt->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($shirt->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$shirt->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$shirt->spl_price, 2)}}</span></p>
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
<div class="container-fluid">
    <div class="design-for-you">
      <h2>Cases</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick18">
        @foreach ($casesProducts as $case)
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
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$case->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$case->spl_price, 2)}}</span></p>
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

<div class="container-fluid">
    <div class="design-for-you">
      <h2>Wall Art</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick19">
        @foreach ($wallProducts as $wall)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$wall->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($wall->images)
                  @foreach ($wall->images as $item)
                      
                      @if($wall->category->name=="Canvas Art")
                        <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                        @break
                      @elseif($wall->category->name=="Wallpapers")
                        <img src="{{ url('image', $item->name) }}" class="img-div-wallpapers" alt="">
                        @break
                    
                      @else
                        <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                        @break
                  @endif
                  @endforeach

                  @else
                    <img src="{{ url('images', $wall->image) }}" class="" alt="">
                    @break
                  @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $wall->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($wall->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($wall->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$wall->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$wall->spl_price, 2)}}</span></p>
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

<div class="container-fluid">
    <div class="design-for-you">
      <h2>Makeup Bags</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick20">
        @foreach ($makeupBags as $bag)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$bag->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($bag->images)
                  @foreach ($bag->images as $item)            
                      @if($bag->category->name=="Makeup Bags")
                      <img src="{{ url('image', $item->name) }}" class="img-div-makeup" alt="">
                      @break                               
                  @else
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                  @endif
                  @endforeach

                     @else
                      <img src="{{ url('images', $bag->image) }}" class="" alt="">
                      @break
                      @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $bag->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($bag->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($bag->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$bag->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$bag->spl_price, 2)}}</span></p>
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

<div class="container-fluid">
    <div class="design-for-you">
      <h2>Mugs</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick21">
        @foreach ($mugs as $mug)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$mug->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($mug->images)
                  @foreach ($mug->images as $item)            
                      @if($mug->category->name=="Mugs")
                      <img src="{{ url('image', $item->name) }}" class="img-div-mugs" alt="">
                      @break                               
                  @else
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                  @endif
                  @endforeach

                     @else
                      <img src="{{ url('images', $mug->image) }}" class="" alt="">
                      @break
                      @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $mug->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($mug->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($mug->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$mug->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$mug->spl_price, 2)}}</span></p>
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

<div class="container-fluid">
    <div class="design-for-you">
      <h2>Bags</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick22">
        @foreach ($bags as $bag)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$bag->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($bag->images)
                    @foreach ($bag->images as $item)  
                        @if($bag->category->name=="Mugs")
                          <img src="{{ url('image', $item->name) }}" class="img-div-mugs" alt="">
                          @break
                        @else
                          <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                          @break
                        @endif
                    @endforeach
                    @else
                      <img src="{{ url('images', $bag->image) }}" class="" alt="">
                      @break
                    @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $bag->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($bag->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($bag->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$bag->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{$bag->spl_price}}</span></p>
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

<div class="container-fluid">
    <div class="design-for-you">
      <h2>Backpacks</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick23">
        @foreach ($backpacks as $back)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$back->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($back->images)
                    @foreach ($back->images as $item)  
                        @if($back->category->name=="Mugs")
                          <img src="{{ url('image', $item->name) }}" class="img-div-mugs" alt="">
                          @break
                        @else
                          <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                          @break
                        @endif
                    @endforeach
                    @else
                      <img src="{{ url('images', $back->image) }}" class="" alt="">
                      @break
                    @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $back->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($back->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($back->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$back->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$back->spl_price, 2)}}</span></p>
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

<div class="container-fluid">
    <div class="design-for-you">
      <h2>Notebooks</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick24">
        @foreach ($notebooks as $note)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$note->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($note->images)
                  @foreach ($note->images as $item)                     
                      @if($note->category->name=="Notebooks")
                      <img src="{{ url('image', $item->name) }}" class="img-div-notebooks" alt="">
                      @break                      
                  @else
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                  @endif
                  @endforeach

                     @else
                      <img src="{{ url('images', $note->image) }}" class="" alt="">
                      @break
                      @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $note->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($note->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($note->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$note->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$note->spl_price, 2)}}</span></p>
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


<div class="container-fluid">
    <div class="design-for-you">
      <h2>Gift Bags</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick25">
        @foreach ($sacks as $sack)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$sack->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($sack->images)
                  @foreach ($sack->images as $item)
                    @if($sack->category->name == "Gift Bags")
                    <img src="{{ url('image', $item->name) }}" class="img-div-gift-bags" alt="">
                    @break
                  @else
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                  @endif
                  @endforeach

                     @else
                      <img src="{{ url('images', $sack->image) }}" class="" alt="">
                      @break
                      @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $sack->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($sack->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($sack->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$sack->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$sack->spl_price, 2)}}</span></p>
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
<div class="container-fluid">
    <div class="design-for-you">
      <h2>Magnets</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick26">
        @foreach ($magnets as $magnet)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$magnet->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($magnet->images)
                  @foreach ($magnet->images as $item)
                      @if($magnet->category->name=="T-Shirts")
                          @if ($item->color == "white" && $item->position == "front")
                          <img src="{{ url('image', $item->name) }}" class="" alt="">
                          @break
                      @endif
                      
                  @else
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                  @endif
                  @endforeach

                     @else
                      <img src="{{ url('images', $magnet->image) }}" class="" alt="">
                      @break
                      @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $magnet->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($magnet->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($magnet->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$magnet->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$magnet->spl_price, 2)}}</span></p>
                      @endif
                  </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>
@endsection