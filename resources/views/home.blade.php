@extends('layouts.master')

@section('content')
<main role="main">
  <div class="design-for-you">
    <h2>Designs picked for you</h2>
  <div class="design-row">
  @foreach ($designs as $design)
  <div class="design-box">
<img src="/image/{{$design->name}}">
  </div>
  <div class="count-product">
    <p>Proizvoda
    @php
        $count = DB::table('product')->where('design_id', $design->id)->groupBy('design_id')->count();
      echo $count;
      @endphp
      </p>
  </div>
  @endforeach
</div>

</div>
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
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-primpary">
                      <a href="{{ url('/product_details', [$product->id]) }}" class="add-to-cart"> View product</a>
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-primpary">
                      <a href="{{ url('/cart/addItem', [$product->id]) }}" class="add-to-cart"> Add to cart</a>
                  </button>                
                </div>
                <small>9 mins</small>
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
  @include('recommends')
</main>
@endsection
