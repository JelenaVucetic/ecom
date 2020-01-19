@extends('layouts.master')

@section('content')

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Album example</h1>
      @foreach($categories as $category)
      <li>{{ ucwords($category->name) }}</li>
      @endforeach
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

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