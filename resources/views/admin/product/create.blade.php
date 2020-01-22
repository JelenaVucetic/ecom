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
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description') }}
                        {{ Form::text('description', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('category_id', 'Categories') }}
                        {{ Form::select('category_id', $categories, null, array('class' => 'form-control', 'placeholder' => 'Select Category')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Price') }}
                        {{ Form::text('price', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('stock', 'Stock') }}
                        {{ Form::text('stock', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('sale price', 'Sale Price') }}
                        {{ Form::text('spl_price', null, array('class' => 'form-control')) }}
                    </div>
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                    
                    {{ Form::close() }}
                </div>
            </div>
        </main>

@endsection