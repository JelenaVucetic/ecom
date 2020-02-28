@extends('layouts.master')

@section('content')

<main role="main">

  @include('layouts.hero')
  @include('layouts.error')

    <div class="my-main-div">
  <div class="welcome-image">
      <img src="/site-images/Slider-photo.png"> 
  </div>
  <div class="welcome-shop">
    <div class="shop-product">
        <p>Shop Prodcut Range</p>
    </div>
    <div class="shop-box">
        <div class="box">
            <img src="/site-images/Mockup - T Shirts - v1 - square.png">
            <button>Shop T-Shirts</button>
        </div>
        <div class="box">
            <img src="/site-images/Mockup - Cases.png">
            <button>Shop Cases</button>
        </div>
        <div class="box">
            <img src="/site-images/OK2OKI0.png">
            <button>Shop Canvas</button>
        </div>
    </div>
    <div class="site-quality">
        <div class="site-box">
            <div class="design-icon"></div>
            <div class="design-text">
                <p class="bold">Authentic designs</p>
                <p>Thousends of designs that you can't buy anywhere else.</p>
            </div>
        </div>
        <div class="site-box">
            <div class="delivery-icon"></div>
            <div class="delivery-text">
                <p class="bold">Delivery at your doors</p>
                <p> Every piece of design you want, you get right at your doors.</p>
            </div>
        </div>
        <div class="site-box">
            <div class="quality-icon"></div>
            <div class="quality-text">
                <p class="bold">High quality products </p>
                <p>We gurantee high standard quality products.</p>
            </div>
        </div>
    </div>
  </div>

  <div class="gifts">
    <div class="gifts-for-him">
        <img class="gift-image" src="/site-images/63334.png">
        <img id="male" src="/site-images/216-Male.svg">
        <button>Gifts for Him</button>
    </div>
    <div class="gifts-for-her">
    <img class="gift-image" src="/site-images/9998.png">
    <img id="female" src="/site-images/217-Female.svg">
    <button>Gifts for Her</button>
  </div>
  </div>

  <div class="myContainer">
      <div class="accessories">
        <p>Accessories</p>
      </div>
  <div class="myRowAcc1">
    <div class="box">
        <img src="/site-images/Mockup2 - mug.png">
        <button>Mugs</button>
    </div>
    <div class="box">
        <img src="/site-images/Coasters.png">
        <button>Coasters</button>
    </div>
    <div class="box">
        <img src="/site-images/82.png">
        <button>Watches</button>
    </div>
  </div>
  <div class="myRowAcc">
    <div class="box">
        <img src="/site-images/Mockup3 - Canvas bags copy.png">
        <button>Canvas bags</button>
    </div>
    <div class="box">
        <img src="/site-images/07 Magneti 4.png">
        <button>Magnets</button>
    </div>
    <div class="box">
        <img src="/site-images/129.png">
        <button>Notebooks</button>
    </div>
  </div>
  </div>
    </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="myRow">
              @forelse($products as $product)
                  <div class="col-md-4">
                      <div class="card mb-4 shadow-sm">
                          <img src="{{ url('images', $product->image) }}" class="card-img" alt="">
                          <div class="card-body">
                              <p class="card-text">{{ $product->name }}</p>
                              <p class="card-text">{{ $product->description }}</p>
                              <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-outline-primpary">
                                          <a href="{{ url('/product_details', [$product->id]) }}" class="add-to-cart"> View product</a>
                                      </button>
                                      <button type="button" class="btn btn-sm btn-outline-primpary">
                                          <a href="{{ url('/cart/addItem', [$product->id]) }}" class="add-to-cart"> Add to cart</a>
                                      </button>
                                  </div>
                                  <small class="text-muted">9 mins</small>
                              </div>
                          </div>
                      </div>
                  </div>
              @empty
                  <h3>No products</h3>
              @endforelse
      </div>
    </div>
  </div>

</main>
@endsection
