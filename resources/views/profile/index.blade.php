@extends('layouts.master')
@section('content')

<section id="cart_items" style="padding-top:100px; padding-bottom:300px;">
    <div class="container">
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
            <h3><span style="color:green">{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                       <table>
                            <tr>
                                <td>
                                    <a href="{{url('/orders')}}" class="btn btn-success">My Orders</a>
                                </td>
                                <td>
                                    <a href="{{url('/address')}}" class="btn btn-success">My Address</a>
                                </td>
                                <td>
                                    <a href="{{url('/password')}}" class="btn btn-success">Change password</a>
                                </td>
                            </tr>
                       </table>
                    </ol>
                </div>
            </div>       
        </div>
    </div>
</section>

@endsection