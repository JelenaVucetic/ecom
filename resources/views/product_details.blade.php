@extends('layouts.master')

@section('content')
    Details page

    <div class="container align-vertical hero">
        <div class="row">
            <div class="col-md-5 text-left">
            
            </div>
        </div>
    </div>
    <section id="index-amazon" style="padding:200px">
        <div class="amazon">
            <div class="container">
                <div class="row">
                    <div class="product">
                        <div class="row">
                            <div class="thumbnail">
                                <img style="width:400px;height:400px" src="{{url('images', $products->image)}}" alt="" class="card-img"> <br>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="product_details">
                                <h2 class="product-title">
                                    <?php echo ucwords($products->name); ?>
                                </h2>
                                <button class="btn btn-primary btn-sm">
                                    <a href="{{ url('/cart/addItem', [$products->id]) }}" class="add-to-cart" style="color:white;">Add to cart</a>
                                </button>
                                <p></p>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="no-padding-top section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="" class="load-more"> <i class="fa fa-ellipsis-h"></i> </a>
                </div>
            </div>
        </div>
    </div>
@endsection