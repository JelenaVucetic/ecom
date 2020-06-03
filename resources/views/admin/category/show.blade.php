@extends('layouts.master')

@section('content')

<section>
@include('layouts.error')
@if(isset($products))
<div class="row">
<div class="col-3" style=" padding-left: 35px;">
</div>
<div class="col-9" style="padding: 0 0;">
    <p id="category-paragraph" style="font-size:20px; font-weight: bolder; ">@if($cat){{$cat}}  @endif</p>
    </div>
</div>
<div class="row" style="margin:0">
    <div class="col-3" style=" padding-left: 35px;">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Category</h3>
            </div>
        
            <ul class="list-unstyled components">
                <?php $counter = 0; ?>
                @foreach($categories as $category)
                <li class="" style="    margin-bottom: 10px;">
                <a href="#homeSubmenu{{$counter}}" id="{{$counter}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ $category->name }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu{{$counter}}">
                        @if($category->children)
                            @foreach ($category->children as $child)
                            <input type="hidden" class="id-hidden" value="{{$id}}">
                            <li>
                            <a class="side-category" data-category="{{$child->id}}" data-id="{{$counter}}" data-myattribute="{{ $child->name }}">{{ $child->name }}</a> 
                            </li>
                            @endforeach
                        @endif
                        <?php $counter++ ?>
                    </ul>
                </li>
                @endforeach
            </ul>

        </nav>
    </div>

    
    <div id="content" class="col-9" style="padding: 0 0;">
       
        @forelse($products as $product)
        <div class="product">
            <a href="{{ url('/product_details', [$product->id]) }}" class="">
                <div class="">
                    <div  class="img-div">
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

{{--     <div>
        <h3>Categories</h3>
        @foreach($categories as $category)
            <h6>{{$category->name}}</h6>
            @if($category->children)
                @foreach ($category->children as $child)
                    <a href="{{route('category.show',$child->id)}}">{{ $child->name }}</a> <br>
                @endforeach
            @endif
        @endforeach
    </div> --}}
     

@endif
</section>
@endsection