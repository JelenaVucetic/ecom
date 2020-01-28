@extends('admin.master')

@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main" style="padding-top:100px;">
        <h3>Edit Category</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'put', 'files' => true]) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', $category->name , array('class' => 'form-control', 'required' => '')) }}
                </div>
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
            </div>
        </div>
    </main>
@endsection
