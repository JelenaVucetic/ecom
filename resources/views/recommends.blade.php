<?php
/* $products1 = DB::table('recommends')
        ->leftJoin('product','recommends.pro_id','product.id')
        ->select('pro_id','name','image','price', DB::raw('count(*) as total'))
        ->groupBy('pro_id','name','image','price')
        ->orderby('total','DESC')
        ->take(7)
        ->get(); */

if(Auth::check()){
 $products2 = \App\Product::join('recommends','recommends.pro_id','product.id' )
         ->select('product.*', DB::raw('count(*) as total'))
         ->distinct('recommends.pro_id')
         ->groupBy('pro_id','name','image','price')
         ->where('uid',Auth::user()->id)
         ->inRandomOrder()
        ->take(18)
        ->get();
}else{
 $products2 = \App\Product::join('recommends','recommends.pro_id','product.id' )
         ->select('product.*', DB::raw('count(*) as total'))
         ->distinct('recommends.pro_id')
         ->groupBy('pro_id','name','image','price')
         ->inRandomOrder()
            ->take(18)
            ->get();
}
?>
<div style="width:90%; margin: 20px auto;">
    <h1>Recomended for you</h1>

    <div class="slick-wrapper">
    <div id="slick7">
    @foreach($products2 as $p)
        <div class="slide-item">
            <div class="product">
                <a href="{{ url('/product_details', [$p->id]) }}" class="">
                    <div class="">
                        <div class="img-div">
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
                                    @elseif($p->category->name=="Pictures")
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
                                <img src="{{ url('image', $item->name) }}" class="" alt="">
                                @break
                            @endif
                        </div>
                            <div class="">
                                <p class="">{{ $p->name }}</p>
                                <?php
                                    $pro_cat = App\Product::find($p->id);
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
            </div>
        @endforeach
        </div>
    </div>
</div>




