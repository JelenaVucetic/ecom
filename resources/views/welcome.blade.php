@extends('layouts.master')

@section('content')

<main role="main">
  @include('layouts.error')

<div class="my-main-div">
    <div class="welcome-image">
        <img src="/site-images/Slider-photo.png"> 
    </div>
    <div class="welcome-shop container">
        <div class="shop-product">
            <p>Shop Prodcut Range</p>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="box-container">
                    <div class="box1-img-holder"></div>
                    <button>Shop T-Shirts</button>        
                </div>       
            </div>
            <div class="col-6 col-md-4">
                <div class="box-container">
                    <div class="box2-img-holder"></div>
                    <button>Shop Cases</button> 
                </div>              
            </div>
            <div id="box3" class="col-12 col-md-4">
                <div class="box-container">
                    <div class="box3-img-holder"></div>
                    <button>Shop Canvas</button>  
                </div>            
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
            <div class="box-container">
                <div class="box10-img-holder"></div>
                <img id="male" src="/site-images/216-Male.svg">
                <button>Gifts for Him</button>
            </div>
        </div>
        <div class="col-6 gifts-for-her">
            <div class="box-container">
                <div class="box11-img-holder"></div>
                <img id="female" src="/site-images/217-Female.svg">
                <button>Gifts for Her</button>
            </div>    
        </div>
    </div>

  <!--   Accessories -->

    <div class="">
        <div class="accessories">
            <p>Accessories</p>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="box-container">
                    <div class="box4-img-holder"></div>
                    <button>Mugs</button>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="box-container">
                    <div class="box5-img-holder"></div>
                    <button>Coasters</button>
                </div>
            </div>
            <div id="box6" class="col-12 col-md-4">
                <div class="box-container">
                    <div class="box6-img-holder"></div>
                    <button>Watches</button>
                </div>
            </div>
        </div>
        <div class="row" id="second-row">
            <div class="col-6 col-md-4">
                <div class="box-container">
                    <div class="box7-img-holder"></div>
                    <button>Canvas bags</button>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="box-container">
                    <div class="box8-img-holder"></div>
                    <button>Magnets</button>
                </div>
            </div>
            <div id="box9" class="col-12 col-md-4">
                <div class="box-container">
                    <div class="box9-img-holder"></div>
                    <button>Notebooks</button>
                </div>
            </div>
        </div>
    </div>


    <div>

    @foreach($categories as $category)
                 <ul>
                            <li>{{$category->name}}</li>
                            @if(count($category->children))
                             
                                @foreach($category->children as $chield)
                                <li>{{$chield->name}}</li>
                                    @if(count($chield->children))
                                        
                                        @foreach($chield->children as $chield)
                                            <p>{{$chield->name}}</p>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif 
                        </ul>
        @endforeach

    </div>

    <div class="container products-title">
        <h3>Newest products</h3>
    </div>
    <div class="slick-wrapper">
    <div id="slick1">
        @foreach($products as $product)
            <div class="slide-item">
                <div class="product">
                    <a href="{{ url('/product_details', [$product->id]) }}" class="">
                        <div class="">
                            <div class="img-div">
                                <img src="{{ url('images', $product->image) }}" class="" alt="">
                            </div>
                            <div class="">
                                <p class="">{{ $product->name }}</p>
                                <?php
                                    $pro_cat = App\Product::find($product->id);
                                    if($pro_cat->category != null){
                                ?>
                                    <p class="">{{ $pro_cat->category->name }}</p>
                                <?php } ?>
                                @if($product->spl_price==0)
                                    <p>{{ $product->price}}&euro;</p>
                                @else
                                    <p>{{$product->spl_price}}&euro;</p>
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
