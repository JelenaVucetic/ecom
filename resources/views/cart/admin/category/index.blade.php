@extends('admin.master')

@section('content')
<div class="navbar" style="width:80%">
    <table class="table table-light">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
         @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-success btn small">Edit</a>
                </td>
                <td>@if($category->status=='0')
                        Enable
                    @else
                        Disable
                    @endif
                </td>
                <a href="{{route('category.edit', $category->id)}}" class="btn btn-success btn small">Edit</a>

            {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                <td>  {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}</td>
            {!! Form::close() !!}
            </tr>
                <td>
                    @if ($category->children)
                        <ul class="list-group mt-2">
                            @foreach ($category->children as $child)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between" style="color:red;">
                                        <a href="">{{ $child->name }} </a>

                                        <div class="button-group d-flex">
                                            <a href="{{route('category.edit', $child->id)}}" class="btn btn-success btn small">Edit</a>
                                            <form action="{{ route('category.destroy', $child->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            @endforeach
            </tbody>
    </table>



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
