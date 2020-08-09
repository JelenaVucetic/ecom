@extends('layouts.master')
@section('content')

<section>
   <h1>Search Results</h1>
   <p>result(s) for '{{ request()->input('query') }}'</p>
    @include('layouts.error')
   <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
          @forelse($products as $product)
          <div class="product product-cat">
            <a href="{{ url('/product_details', [$product->id]) }}" class="">
                <div class="">
                    <div class="img-div img-div-cat">
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
        @empty
        <h3>No products</h3>
        @endforelse
      </div>
    </div>
  </div>
</section>
@endsection
