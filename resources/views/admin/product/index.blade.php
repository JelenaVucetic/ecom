@extends('admin.master')

@section('content')
    @forelse($products as $product)
        <li>
            <h4 style="margin-top:50px;">Name of product: {{ $product->name }}</h4>
        </li>
    @empty
    <h3>No products</h3>
    @endforelse
@endsection