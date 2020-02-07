@extends('layouts.master')
@section('content')
<section style="margin:100px;">  
   <h1>Search Results</h1>
   <p>result(s) for '{{ request()->input('query') }}'</p>
    @include('layouts.error')
   <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
          @forelse($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
              <img src="{{ url('images', $product->image) }}" class="card-img" alt="">
            <div class="card-body">
                <p class="card-text">{{ $product->name }}</p>
              <p class="card-text">{{ $product->description }}</p>
                <p id="price">
                  @if($product->spl_price==0)
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text">${{$product->price}}</p>
                        <p class="card-text"></p>
                    </div>
                         @else

                      <div class="d-flex justify-content-between align-items-center">
                          <p class="" style="text-decoration:line-through; color:#333">${{$product->price}}</p>
                          <img src="" alt="..."  style="width:60px">
                          <p class="">${{$product->spl_price}}</p>
                      </div>
                  @endif
                </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-primpary">
                      <a href="{{ url('/product_details', [$product->id]) }}" class="add-to-cart">View product</a>
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-primpary">
                      <a href="{{ url('/cart/addItem', [$product->id]) }}" class="add-to-cart">Add to cart</a>
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
</section>
@endsection