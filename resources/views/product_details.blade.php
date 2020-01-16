@extends('layouts.master')

@section('content')
    details page

    <div style="width:20rem;">
        <img src=" {{ url('images', $products->image) }} " alt="">
        <div>
            <h4>Card title</h4>
            <p>Lorem ipsum dolor sit amet</p>
            <a href="">Read more</a>
        </div>
    </div>

    <div class="product-information">
        <img src="" alt="">
        <h2><?php echo ucwords($products->name) ?></h2>
    </div>
@endsection