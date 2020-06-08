<div class="col-md-4 well well-sm" id="profile-navbar">
    <nav class="nav flex-column profile-nav">
        <a href="{{url('/profile')}}" class="{{Request::path() === 'profile' ? 'active' : 'nav-link'}}">My Orders</a>
        <a href="{{url('/wishlist')}}" class="{{Request::path() === 'wishlist' ? 'active' : 'nav-link'}}"><span>Wishlist ({{App\wishlist::count()}})</span> </a>
        <a href="{{url('/address')}}" class="{{Request::path() === 'address' ? 'active' : 'nav-link'}}">My address</a>
        <a href="{{url('/password')}}" class="{{Request::path() === 'password' ? 'active' : 'nav-link'}}">Change Password</a>
        <a href="{{url('/profile_image')}}" class="{{Request::path() === 'profile_image' ? 'active' : 'nav-link'}}">Your profil image</a>
    </nav>
</div>