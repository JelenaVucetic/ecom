@extends('layouts.master')
@section('content')
<section id="cart_items" style="margin-bottom: 50px;">
    <div class="container">
        <div class="row">
            @include('profile.menu') 
            <div class="col-md-8 avatar">
                <h3>Avatar</h3> 
                <div>
                    <img src="/avatars/{{ Auth::user()->avatar }}" style="width:100px;border-radius:50%;height: 100px;object-fit: cover;">
                    <form enctype="multipart/form-data" action="/profile_image" method="POST">
                        @csrf
                        <div style="display: flex; flex-direction: column;padding: 10px;">
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                        </div>
                        <input type="submit" class="avatar-btn" value="Upload">
                    </form>
                </div>
                <p>You can inject a little more personality into your profile by uploading an avatar (an image, photo or other graphic icon of "you").</p>
            </div>       
        </div>
    </div>
</section>
@endsection