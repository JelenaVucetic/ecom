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
         ->select('pro_id','name','image','price', DB::raw('count(*) as total'))
         ->distinct('recommends.pro_id')  
         ->groupBy('pro_id','name','image','price')   
         ->where('uid',Auth::user()->id)
         ->inRandomOrder()
        ->take(7)
        ->get();
}else{
 $products2 = DB::table('recommends')
         ->leftJoin('product','recommends.pro_id','product.id')
         ->select('pro_id','name','image','price', DB::raw('count(*) as total'))
         ->distinct('recommends.pro_id')  
         ->groupBy('pro_id','name','image','price')  
         ->inRandomOrder()
        ->take(7)
        ->get();
}    
?>
<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
<h1>Recomended for you</h1>
    <div class="carousel-inner">
        <div class="item">  
                @foreach($products2 as $p)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                          
                                <img  style="width:200px;height:200px;" src="{{url('images',$p->image)}}" alt="" />
                            <h2>${{$p->price}}</h2>
                            <p> {{$p->name}}</p>
                            <a href="{{url('/cart/addItem')}}/{{$p->pro_id}}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>            
</div>




