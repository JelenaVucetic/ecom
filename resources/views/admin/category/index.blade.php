@extends('admin.master')

@section('content')
<div class="navbar" style="width:30%">
    <div>
        <a href="" class="navbar-brand">Categories</a>
        <ul class="nav navbar-nav">
        @if(!empty($categories))
            @forelse($categories as $category)
            <li class="active">
                <a href="{{route('category.show', $category->id)}}">{{ $category->name}}</a>
            </li>
            @empty
            <li>No Items</li>
            @endforelse
        @endif
        </ul>
    </div>
    <di>
    <h3>Add a category</h3>
        {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
        <div class="form-group">
            {{ Form::label('name', 'Title')}}
            {{ Form::text('name', null, array('class' => 'form-control'))}}
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        {!! Form::close() !!}
    </div>
</div>

<!-- products-->
@if(isset($products))
    <h3>Products</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Products</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{$product->name}}</td>
            </tr>
        @empty
            <tr>
                <td>no data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endif

@endsection