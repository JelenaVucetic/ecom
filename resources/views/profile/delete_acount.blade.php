@extends('layouts.master')
@section('content')

<section id="cart_items" style="margin-bottom: 200px;">
    <div class="container">
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8">
                <h4 style="padding-bottom:20px; border-bottom: 1px solid lightgray;"> <strong>We're sorry to see you go.</strong></h4>
                <div>
                    <p>If you choose to cancel your account:</p>
                    <ul>
                        <li>Your profile will be removed</li>
                        <li>Any comments or forum posts will remain</li>
                    </ul>
                </div>
                <div>
                    <p>Please be aware that this is a permanent action. </p>
                    <p>We cannot restore cancelled accounts.</p>
                </div>
                <form action="{{route('user.delete')}}"  method="post">
                @csrf
                <button type="submit" style="
                            width: 300px;
                            margin: auto;
                            border: none;
                            border-radius: 5px;
                            background: #E6003A;
                            color: white;
                            padding: 5px;">Yes, I'm serious - cancel my acount</button>
            </form>
            </div>       
        </div>
    </div>
</section>

@endsection