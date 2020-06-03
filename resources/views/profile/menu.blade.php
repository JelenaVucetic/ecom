<div class="col-md-4 well well-sm">
    <nav class="nav flex-column profile-nav">
        <a href="{{url('/profile')}}" class="nav-link">My Orders</a>
        <a href="{{url('/wishlist')}}" class="nav-link"><span>Wishlist ({{App\wishlist::count()}})</span> </a>
        <a href="{{url('/address')}}" class="nav-link">My address</a>
        <a href="{{url('/password')}}" class="nav-link">Change Password</a>
    </nav>
</div>