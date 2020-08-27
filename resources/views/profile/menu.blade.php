<div class="col-md-4 well well-sm" id="profile-navbar">
    <nav class="nav flex-column profile-nav">
        <a href="{{url('/profile')}}" class="{{Request::path() === 'profile' ? 'active' : 'nav-link'}}">Orders</a>
{{--         <a href="{{url('/my_wishlist')}}" class="{{Request::path() === 'my_wishlist' ? 'active' : 'nav-link'}}"><span>Wishlist </span> </a>
 --}}        <a href="{{url('/address')}}" class="{{Request::path() === 'address' ? 'active' : 'nav-link'}}">Edit Address</a>
        <a href="{{url('/password')}}" class="{{Request::path() === 'password' ? 'active' : 'nav-link'}}">Change Password</a>
        <a href="{{url('/profile_image')}}" class="{{Request::path() === 'profile_image' ? 'active' : 'nav-link'}}">Edit Profil Image</a>
        <a href="{{url('/delete')}}" class="{{Request::path() === 'delete' ? 'active' : 'nav-link'}}">Cancel Account</a>
    </nav>
</div>