@extends('admin.master')

@section('content')
<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="padding-top:100px;">
    <h3>Edit Product</h3>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
        {!! Form::open(['route' => ['product.update', $product->id], 'method' => 'put', 'files' => true]) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', $product->name , array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                        @error('name')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('name')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::text('description', $product->description , array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                    @error('description')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('description')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="cat_id" required>
                            <option value="">Select a Category</option>

                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->cat_id ? 'selected' : '' }}>{{ $cat->name }}</option>

                                @if ($cat->children)
                                    @foreach ($cat->children as $child)
                                        <option value="{{ $child->id }}" {{ $child->id == $product->cat_id ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('category_id')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="tags">Tags</label>
                      <select name="tags[]" id="" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                      </select>

                    @error('tags')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('tags')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('price', $product->price , array('class' => 'form-control')) }}
                    @error('price')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('price')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image', null, array('class' => 'form-control')) }}
                     @error('image')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('image')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('sale price', 'Sale Price') }}
                        {{ Form::text('spl_price', $product->spl_price, array('class' => 'form-control')) }}
                    @error('spl_price')
                      <p class="help is-danger" style="color:red;">{{ $errors->first('spl_price')}}</p>
                      @enderror
                    </div>
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
        </div>
        <div class="col-md-3">
            <h3>Change Image</h3>
            <img src="{{ url('images', $product->image) }}" class="card-img-top img-fluid" style="width:200px;" alt="">
            <p><a href="{{ route('ImageEditForm', $product->id) }}" class="btn btn-info">Change image</a></p>
        </div>
        <div class="col-md-3">
            <h3>Add property</h3>

            <p><a href="{{ route('addProperty', $product->id) }}" class="btn btn-info">Add property</a></p>
        </div>

    </div>
</main>
@endsection
