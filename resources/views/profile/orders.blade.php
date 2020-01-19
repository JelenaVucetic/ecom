@extends('layouts.master')

@section 
    <div style="padding:200px">
        @foreach($orders as $order)
        <p>{{$order->total}}</p>
        @endforeach
    </div>
@endsection