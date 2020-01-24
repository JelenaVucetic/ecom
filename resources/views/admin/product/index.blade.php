@extends('admin.master')

@section('content')
    @forelse($products as $product)
    <div style="border:1px solid green; margin:10px ">
        <ul>
        <li  style="margin-top:50px;">Product id: {{$product->id}}</li>
        <li>Name of product: {{ $product->name }} </li>
        <li>Description of product: {{ $product->description }} </li>
        <li><img src="{{url('images', $product->image)}}" alt="" style="width:100px;height:100px;"></li>
        <li>Product price: {{ $product->price}} </li>
     <!--    category not working after updating product
        <li>Category: {{$product->category->name}}</li> -->
        <li><a href="{{route('product.edit', $product->id)}}" class="btn btn-success btn small">Edit</a></li>
        </ul>
    </div>
    @empty
    <h3>No products</h3>
    @endforelse
@endsection