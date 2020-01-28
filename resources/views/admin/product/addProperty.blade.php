@extends('admin.master')

@section('content')
<section id="container" style="padding-top:100px">
    <section class="main-content">
        <section class="wrapper">
            <div class="content-box-large">
                {!! Form::model($product, ['method' => 'post', 'action' => ['ProductsController@submitProperty', $product->id], 'files' =>true]) !!}
                <div class="panel-heading col-md-8">
                    <div class="panel-title">
                    Add Property
                    <input type="submit" class="btn btn-success" value="Submit Property">
                    </div>
                </div>
                <div class="col-md-12">
                    <b>Product Name:</b>
                    <select name="pro_id" class="form-control">
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    </select> <br>
                Size:<select name="size" class="form-control">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                Color:<select name="color">
                         <option value="blue">blue</option>
                        <option value="red">red</option>
                    </select>
                Price: <input type="text" name="p_price" class="form-control">
                </div>
                {!! Form::close() !!}
            </div>
        </section>
    </section>
</section>
@endsection