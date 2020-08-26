@extends('admin.master')

@section('content')
<section id="container">

    <section id="main-content">
        <section class="wrapper">
            <h2>Change Image</h2>
            <div class="col-md-5">
                {!!  Form::open(['route' => 'editProImage', 'method' => 'post', 'files' => true]) !!}

                <input type="hidden" name='id' class='form-control' value='{{$product->id}}'>
                <input type="text" class="form-control" value="{{ $product->name}}" readonly="readonly">
                <br>
                <img src="{{ url('images', $product->image) }}" class='card-img-top img-fluid' style="width:200px" alt="">
                <br>
                Select Image:
                {{ Form::label('image', 'Image')}}
                {{ Form::file('image', array('class' => 'form-control')) }}
                <br>
                <input type="submit" value="Upload Image" class="btn btn-success pull-right">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {!! Form::close() !!}
            </div>
        </section>
    </section>
</section>
@endsection