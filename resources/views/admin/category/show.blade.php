@extends('layouts.master')

@section('content')

<section>
@include('layouts.error')
@if(isset($products))
<div class="row" id="cat-show-paragraph" style="margin:0;">
    <div class="col-3" style=" padding-left: 35px;">
    </div>
    <div class="col-9" style="padding: 0 0; display:flex;">
        <p id="category-paragraph" data-gender="" data-myattribute="@if($cat){{$cat}}  @endif" data-id="@if($id){{$id}}  @endif" style="font-size:20px; font-weight: bolder; ">@if($cat){{$cat}}  @endif</p>
        <div class="gender" id="male-div" data-value="male" style="display: none;">Man <i class="fas fa-times" id="male-x"></i></div>
        <div class="gender" id="female-div" data-value="female" style="display: none;">Woman <i class="fas fa-times" id="female-x"></i></div>
    </div>
</div>
<div style="text-align: center">
      {{--   <div>
        <a class="side-category-gender" id="round-btn" data-value="male" >Male  <i class="fas fa-plus"></i></a>
        </div>
        <p></p>
        <a class="side-category-gender" data-value="female" style="color: black!important">Female   <i class="fas fa-plus"></i></a> --}}
        <div id="mobile-gender" style="display: none;">
              <label class="man-label" id="man-mobile">
                  <input type="radio"  id="check-man" name="print"  class="print-class">
                  <span style="border: 1px solid;" id="span-man">Man</span>
              </label>
              <label class="woman-label" id="woman-mobile">
                  <input type="radio" id="check-woman" name="print" class="print-class">
                  <span style="border: 1px solid;" id="span-woman">Woman</span>
              </label>
          </div>
</div>
<div class="row" style="margin:0">

    <div class="col-3" style=" padding-left: 80px;">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Category</h3>
            </div>

            <ul class="list-unstyled components">
                <a href="#homeSubmenu"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gender</a>
                <ul class="collapse list-unstyled show" id="homeSubmenu">
                    <li>
                        <a class="side-category-gender" data-value="male">Man</a>
                    </li>
                    <li>
                        <a class="side-category-gender" data-value="female">Woman</a>
                    </li>
                </ul>
                <?php $counter = 1; ?>
                @foreach($categories as $category)
                <li class="" style="margin-bottom: 10px;">
                    <a href="#homeSubmenu{{$counter}}" id="{{$counter}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ $category->name }}</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu{{$counter}}">
                        <li>
                            <a class="side-category" data-category="{{$category->id}}" data-id="{{$counter}}" data-myattribute="{{ $category->name }}" >All {{ $category->name }}</a>
                        </li>
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

         @if ($mainCategory->parent_id == null)

         <div id="content" class="row products-category">
        @forelse ($clothingProducts as $p)
        <div class="product product-cat">
            <a href="{{ url('/product_details', [$p->id]) }}" class="">
                <div class="">
                    <div  class="img-div img-div-cat">
                        @if ($p->images)

                        @foreach ($p->images as $item)
                        @if($p->category->name=="T-Shirts")

                              @if ($item->color == "white" && $item->position == "front")
                              <img src="{{ url('image', $item->name) }}" class="" alt="">
                              @break
                              @endif
                              @elseif( $p->category->getParentsNames() == "Cases" && $item->color == "transparent")
                              <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                              @break
                              @elseif($p->category->name=="Canvas Art")
                              <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                              @break
                                @elseif($p->category->name=="Wallpapers")
                                <img src="{{ url('image', $item->name) }}" class="img-div-wallpapers" alt="">
                                @break
                                @elseif($p->category->name=="Notebooks")
                                <img src="{{ url('image', $item->name) }}" class="img-div-notebooks" alt="">
                                @break
                                @elseif($p->category->name=="Makeup Bags")
                                <img src="{{ url('image', $item->name) }}" class="img-div-makeup" alt="">
                                @break
                                @elseif($p->category->name=="Masks")
                                <img src="{{ url('image', $item->name) }}" class="img-div-masks" alt="">
                                @break
                                @elseif($p->category->name=="Thermoses")
                                <img src="{{ url('image', $item->name) }}" class="img-div-thermos" alt="">
                                 @break
                                 @elseif($p->category->name=="Mugs")
                                 <img src="{{ url('image', $item->name) }}" class="img-div-mugs" alt="">
                                  @break
                              @else
                              <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                              @break
                              @endif
                            @endforeach

                           @else
                            <img src="{{ url('images', $p->image) }}" class="" alt="">
                            @break
                            @endif
                    </div>
                    <div class="product-info">
                        <p class="">{{ $p->name }}</p>
                        <?php
                            $pro_cat = App\Product::find($p->id);
                            if($pro_cat->category != null){
                        ?>
                            <p class="">{{ $pro_cat->category->name }}</p>
                        <?php } ?>
                        @if($p->spl_price==0)
                            <p>From: <span style="font-weight: bold">{{ $p->price}}&euro;</span></p>
                        @else
                            <p>Special price: <span style="font-weight: bold">{{$p->spl_price}}&euro;</span></p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
        @empty

        @endforelse
         </div>
       @else
       <?php $no = 0; ?>
       <div id="content" class="row products-category" style="padding: 0 0; display:flex; width: 75%;">

        @forelse($products as $product)
        {{-- @if($no % 4 == 0) --}}

        {{-- @endif --}}

        <div class="product product-cat">
            <a href="{{ url('/product_details', [$product->id]) }}" class="">
                <div class="">
                    <div  class="img-div img-div-cat">
                        @if ($product->images)

                                @foreach ($product->images as $item)
                                @if($product->category->name=="T-Shirts")
                                    @if ($item->color == "white" && $item->position == "front")
                                        <img src="{{ url('image', $item->name) }}" class="" alt="">
                                        @break
                                    @endif
                                @elseif( $product->category->getParentsNames() == "Cases" && $item->color == "transparent")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                                    @break
                                @elseif($product->category->name=="Canvas Art")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-pictures" alt="">
                                    @break
                                @elseif($product->category->name=="Wallpapers")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-wallpapers" alt="">
                                    @break
                                @elseif($product->category->name=="Notebooks")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-notebooks" alt="">
                                    @break
                                @elseif($product->category->name=="Makeup Bags")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-makeup" alt="">
                                    @break
                                @elseif($product->category->name == "Masks")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-masks" alt="">
                                    @break
                                @elseif($product->category->name == "Gift Bags")
                                    <img src="{{ url('image', $item->name) }}" class="img-div-gift-bags" alt="">
                                    @break
                                @else
                                    <img src="{{ url('image', $item->name) }}" class="img-div-phone" alt="">
                                    @break
                                @endif
                            @endforeach
                        @else
                        <img src="{{ url('image', $item->name) }}" class="" alt="">
                        @break
                        @endif
                    </div>
                    <div class="product-info">
                        <p class="">{{ $product->name }}</p>
                        <?php
                        $pro_cat = App\Product::find($product->id);
                        if($pro_cat->category != null){
                        ?>
                        <p class="">{{ $pro_cat->category->name }}</p>
                        <?php } ?>
                        @if($product->spl_price==0)
                            <p>From: <span style="font-weight: bold">{{ $product->price}}&euro;</span></p>
                        @else
                            <p>Special price: <span style="font-weight: bold">{{$product->spl_price}}&euro;</span></p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
     {{--    @if($no % 4 ==0)
    </div>
    @endif --}}
    <?php $no++ ?>
        @empty
            <h3>No products</h3>
        @endforelse
        @endif
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
