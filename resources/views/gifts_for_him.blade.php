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
      <div id="slick9">
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
      <div id="slick10">
        @foreach ($casesProducts as $case)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$case->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($case->images)
                  @foreach ($case->images as $item)              
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
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
    <div class="design-for-you" style="margin-top: 50px;">
      <h2>Wall Art</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick11">
        @foreach ($wallProducts as $wall)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$wall->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($wall->images)
                  @foreach ($wall->images as $item)
                  @if($wall->category->name=="T-Shirts")
                    @if ($item->color == "white" && $item->position == "front")
                      <img src="{{ url('image', $item->name) }}" class="" alt="">
                      @break
                      @endif
                      @elseif( $wall->category->getParentsNames() == "Cases" && $item->color == "transparent")
                      <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                      @break
                      @elseif($wall->category->name=="Canvas Art")
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
      <div id="slick12">
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
      <div id="slick13">
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
      <h2>Backpacks</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick14">
        @if ($backpacks)
        @foreach ($backpacks as $bag)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$bag->id]) }}" class="">
                <div class="">
                  <div class="img-div">
               {{--    @if ($bag->images)
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
                    @endif --}}
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
        @else 
          <div>Nema</div>
        @endif
      </div>
    </div>
</div>
<div class="container-fluid">
    <div class="design-for-you">
      <h2>Clocks</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick15">
        @foreach ($clocks as $clock)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$clock->id]) }}" class="">
                <div class="">
                  <div class="img-div">
                  @if ($clock->images)
                    @foreach ($clock->images as $item)
                    
                      @if($clock->category->name=="Mugs")
                      <img src="{{ url('image', $item->name) }}" class="img-div-mugs" alt="">
                      @break
                      @else
                        <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                        @break
                      @endif
                      @endforeach

                  @else
                    <img src="{{ url('images', $clock->image) }}" class="" alt="">
                    @break
                  @endif
                  </div>
                  <div class="">
                      <p class="product-name">{{ $clock->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($clock->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="product-category">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($clock->spl_price==0)
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$clock->price, 2)}}</span></p>
                      @else
                          <p><span style="font-weight: bold">&euro;{{number_format((float)$clock->spl_price, 2)}}</span></p>
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
      <div id="slick16">
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
@endsection