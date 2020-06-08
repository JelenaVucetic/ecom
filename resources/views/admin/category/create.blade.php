@extends('admin.master')

@section('content')
    <div class="col-md-12">
        <div class="card card-body bg-success text-white py-5">
            <h2>Create Category</h2>
            <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
            {!! Form::open(['route' => 'category.store', 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
            <div class="form-group">
                <select class="form-control" name="parent_id">
                    <option value="">Select Parent Category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image">
                @error('image')
                <p class="help is-danger">{{ $errors->first('image')}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image">
                @error('cover_image')
                <p class="help is-danger">{{ $errors->first('cover_image')}}</p>
                @enderror
            </div>
            <td>Category Status</td>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Category</button>
          {!! Form::close() !!}
     </div>
</div>
@endsection