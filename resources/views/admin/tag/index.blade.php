@extends('admin.master')

@section('content')
<div class="navbar" style="width:30%">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Tag Name</th>
                <th>Edit</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
         @foreach($tags as $tag)
            <tr>
                <td><a href="{{route('tag.show',$tag->id)}}">{{$tag->name}}</a></td>
                <td>
                    <a href="{{route('tag.edit', $tag->id)}}" class="btn btn-success btn small">Edit</a>
                </td>
                <td>@if($tag->status=='0')
                        Enable
                    @else
                        Disable
                    @endif
                </td>
            {!! Form::open(['method'=>'DELETE', 'action'=> ['TagsController@destroy', $tag->id]]) !!}
                <td>  {!! Form::submit('Delete Tag', ['class'=>'btn btn-danger col-sm-6']) !!}</td>
            {!! Form::close() !!}
            </tr>
                
            @endforeach
            </tbody>
    </table>


    <div class="col-md-12">
        <div class="card card-body bg-success text-white py-5">
            <h2>Create Tag</h2>
            <p class="lead">Lorem Ipsum has been the industry's standard dummy text ever since the</p>
            {!! Form::open(['route' => 'tag.store', 'method' => 'post']) !!}
    
            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            <td>Tag Status</td>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Tag</button>
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
