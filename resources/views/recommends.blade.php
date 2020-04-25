<?php
/* $products1 = DB::table('recommends')
        ->leftJoin('product','recommends.pro_id','product.id')
        ->select('pro_id','name','image','price', DB::raw('count(*) as total'))
        ->groupBy('pro_id','name','image','price')
        ->orderby('total','DESC')
        ->take(7)
        ->get(); */

if(Auth::check()){
 $products2 = DB::table('recommends')
         ->leftJoin('product','recommends.pro_id','product.id')
         ->select('pro_id','name','image','price', 'spl_price', DB::raw('count(*) as total'))
         ->distinct('recommends.pro_id')  
         ->groupBy('pro_id','name','image','price')   
         ->where('uid',Auth::user()->id)
         ->inRandomOrder()
        ->take(18)
        ->get();
}else{
 $products2 = DB::table('recommends')
         ->leftJoin('product','recommends.pro_id','product.id')
         ->select('pro_id','name','image','price', 'spl_price', DB::raw('count(*) as total'))
         ->distinct('recommends.pro_id')  
         ->groupBy('pro_id','name','image','price')  
         ->inRandomOrder()
        ->take(18)
        ->get();
}    
?>
<div>
    <h1>Recomended for you</h1>

    <div class="slick-wrapper">
    <div id="slick7">
    @foreach($products2 as $p)
        <div class="slide-item">
            <div class="product">
                <a href="{{ url('/product_details', [$p->pro_id]) }}" class="">
                    <div class="">
                            <div class="">
                                <img src="{{ url('images', $p->image) }}" class="" alt="">
                            </div>
                            <div class="">
                                <p class="">{{ $p->name }}</p>
                                <?php
                                    $pro_cat = App\Product::find($p->pro_id);
                                    if($pro_cat->category != null){
                                ?>
                                    <p class="">{{ $pro_cat->category->name }}</p>
                                <?php } ?>
                                @if($p->spl_price==0)
                                    <p>{{ $p->price}}&euro;</p>
                                @else
                                    <p>{{$p->spl_price}}&euro;</p>
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




