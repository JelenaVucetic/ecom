@extends('layouts.master')
@section('content')

<section id="cart_items" style="padding:200px">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4 well well-sm">
                <nav class="nav flex-column">
                    <a href="/" class="nav-link">Home</a>
                    <a href="{{url('profile')}}">My profile</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section id="cart_items">
    <div class="container">
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
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
                        <h3><span style="color:green">{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>
                    </ol>
                </div>
            </div>       
        </div>
    </div>
</section>

@endsection