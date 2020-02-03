@extends('admin.master')

@section('content')
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1>Dashboard</h1>
            <div class="col-md-6">
                <h1>Shirt</h1>
                <h1>Add New</h1>
                <div class="panel-body">
                    {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                        @error('name')
                      <p class="help is-danger">{{ $errors->first('name')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::text('description', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                        @error('description')
                      <p class="help is-danger">{{ $errors->first('description')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Select a Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>

                                @if ($category->children)
                                    @foreach ($category->children as $child)
                                        <option value="{{ $child->id }}" {{ $child->id == old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
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
                        {{ Form::text('price', null, array('class' => 'form-control')) }}
                        @error('price')
                      <p class="help is-danger">{{ $errors->first('price')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('stock', 'Stock') }}
                        {{ Form::text('stock', null, array('class' => 'form-control')) }}
                        @error('stock')
                      <p class="help is-danger">{{ $errors->first('stock')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image', null, array('class' => 'form-control')) }}
                        @error('image')
                      <p class="help is-danger">{{ $errors->first('image')}}</p>
                      @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('sale price', 'Sale Price') }}
                        {{ Form::text('spl_price', null, array('class' => 'form-control')) }}
                        @error('spl_price')
                      <p class="help is-danger">{{ $errors->first('spl_price')}}</p>
                      @enderror
                    </div>
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}
                </div>
            </div>
        </main>

@endsection
