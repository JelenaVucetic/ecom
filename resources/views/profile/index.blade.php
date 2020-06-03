@extends('layouts.master')
@section('content')

<section id="cart_items" style="margin-bottom: 200px;">
    <div class="container">
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
                <h3><span style="color:green;">{{ucwords(Auth::user()->name)}}</span>, 
                    Your Orders
                </h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product name</th>
                            <th>Order total</th>
                            <th>Order status</th>
                            <th>Detsils</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->product_id}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->status}}</td>
                            <td>view</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>       
        </div>
    </div>
</section>

@endsection