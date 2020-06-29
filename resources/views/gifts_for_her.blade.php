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
                  <div  class="img-div">
                      <img src="{{ url('images', $shirt->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $shirt->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($shirt->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($shirt->spl_price==0)
                          <p>{{ $shirt->price}}&euro;</p>
                      @else
                          <p>{{$shirt->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $case->image) }}" class="" alt="">
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
                  <div  class="img-div">
                      <img src="{{ url('images', $wall->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $wall->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($wall->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($wall->spl_price==0)
                          <p>{{ $wall->price}}&euro;</p>
                      @else
                          <p>{{$wall->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $bag->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $bag->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($bag->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($bag->spl_price==0)
                          <p>{{ $bag->price}}&euro;</p>
                      @else
                          <p>{{$bag->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $mug->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $mug->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($mug->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($mug->spl_price==0)
                          <p>{{ $mug->price}}&euro;</p>
                      @else
                          <p>{{$mug->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $bag->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $bag->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($bag->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($bag->spl_price==0)
                          <p>{{ $bag->price}}&euro;</p>
                      @else
                          <p>{{$bag->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $back->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $back->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($back->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($back->spl_price==0)
                          <p>{{ $back->price}}&euro;</p>
                      @else
                          <p>{{$back->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $note->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $note->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($note->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($note->spl_price==0)
                          <p>{{ $note->price}}&euro;</p>
                      @else
                          <p>{{$note->spl_price}}&euro;</p>
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
      <h2>Sacks</h2>
    </div>
  
    <div class="slick-wrapper">
      <div id="slick25">
        @foreach ($sacks as $sack)
          <div class="slide-item">
            <div class="product">
              <a href="{{ url('/product_details', [$sack->id]) }}" class="">
                <div class="">
                  <div  class="img-div">
                      <img src="{{ url('images', $sack->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $sack->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($sack->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($sack->spl_price==0)
                          <p>{{ $sack->price}}&euro;</p>
                      @else
                          <p>{{$sack->spl_price}}&euro;</p>
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
                  <div  class="img-div">
                      <img src="{{ url('images', $magnet->image) }}" class="" alt="">
                  </div>
                  <div class="">
                      <p class="">{{ $magnet->name }}</p>
                      <?php
                          $pro_cat = App\Product::find($magnet->id);
                          if($pro_cat->category != null){
                      ?>
                          <p class="">{{ $pro_cat->category->name }}</p>
                      <?php } ?>
                      @if($magnet->spl_price==0)
                          <p>{{ $magnet->price}}&euro;</p>
                      @else
                          <p>{{$magnet->spl_price}}&euro;</p>
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