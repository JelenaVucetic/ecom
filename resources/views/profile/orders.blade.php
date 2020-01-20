@extends('layouts.master')

@section('content') 
<section id="cart_items" style="padding:200px">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}">Profile</a></li>
                <li class="active">My order</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-4 well well-sm">
                <ul class="nav navbar">
                    <h3>Quick Links</h3>
                    <li>My Profile</li>
                    <li>My Orders</li>
                    <li>My Address</li>
                    <li>Change Password</li>
                </ul>
            </div>
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
                            <td>{{$order->name}}</td>
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