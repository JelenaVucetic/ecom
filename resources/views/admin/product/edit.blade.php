@extends('admin.master')

@section('content')
<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="padding-top:100px;">
    <h3>Edit Product</h3>
    <div class="row">
        <div class="col-md-4">
        {!! Form::open(['route' => ['product.update', $product->id], 'method' => 'put', 'files' => true]) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', $product->name , array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::text('description', $product->description , array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                    </div>
                    <div class="form-group">
                       <select name="cat_id" class="form-control">
                       @foreach($categories as $cat)
                            Category: <option value="{{ $cat->id }}" <?php if($product->cat_id==$cat->id) { ?> selected="selected" <?php } ?> >
                                         {{ ucwords($cat->name) }}
                                      </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('price', $product->price , array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('stock', 'Stock') }}
                        {{ Form::text('stock', $product->stock , array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('sale price', 'Sale Price') }}
                        {{ Form::text('spl_price', $product->spl_price, array('class' => 'form-control')) }}
                    </div>
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                    
                    {{ Form::close() }}
        </div>
        <div class="col-md-3">
            <h3>Change Image</h3>
            <img src="{{ url('images', $product->image) }}" class="card-img-top img-fluid" style="width:200px;" alt="">
            <p><a href="{{ route('ImageEditForm', $product->id) }}" class="btn btn-info">Change image</a></p>
        </div>
    </div>
</main>
@endsection