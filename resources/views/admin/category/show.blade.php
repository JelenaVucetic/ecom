@extends('layouts.master')

@section('content')
@include('layouts.hero')

<section>
@include('layouts.error')
@if(isset($products))
<div class="container-fluid">
<div class="row">
    <div>
        <h3>Categories</h3>
        @foreach($categories as $category)
            <h6>{{$category->name}}</h6>
            @if($category->children)
                @foreach ($category->children as $child)
                    <a href="{{route('category.show',$child->id)}}">{{ $child->name }}</a> <br>
                @endforeach
            @endif
        @endforeach
    </div>
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
@endif
</section>
@endsection