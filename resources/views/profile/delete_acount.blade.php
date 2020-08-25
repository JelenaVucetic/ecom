@extends('layouts.master')
@section('content')

<section id="cart_items" style="margin-bottom: 200px;">
    <div class="container">
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
               <form action="{{route('user.delete')}}"  method="post">
                @csrf
                <button type="submit"> delete</button>
            </form>
            </div>       
        </div>
    </div>
</section>

@endsection