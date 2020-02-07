<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <?php if(Auth::check()) {?>
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
      </li>
       <?php } else { ?>
        <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
       <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="/shop">shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
      <li class="nav-item dropdown">
      <?php if(Auth::check()) {?>
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
          <?php } else { ?>
            <a class="dropdown-item"href="{{ url('/login') }}" style="background-color:white;">Login</a>
            <li class="list-inline-item"> <a  href="{{ route('register') }}">Register</a> </li>
          <?php } ?>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php if(Auth::check()) {?>
            <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
            <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
          <?php } else { ?>
            <a class="dropdown-item"href="{{ url('/login') }}">Login</a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-secondary badge-pill"><i class="fa fa-shopping-cart"></i> Cart:{{Cart::count()}}</span></a>
        <div class="dropdown-menu" aria-labelledby="dropdown01" style="width:350px;">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="badge badge-secondary badge-pill"><i class="fa fa-shopping-cart"></i>{{Cart::count()}}</span>
          <span class="text-muted">Total: ({{Cart::total()}})</span>
        </h4>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
        </h4>
      <ul class="list-group mb-3">
        <?php $cartItems = Cart::content();?>
            @foreach($cartItems as $cartItem)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div class="col-md-6">
          <div>
            <img  class="dropdownimage" src="{{url('images',$cartItem->options->img)}}"  class="img-responsive dropdownimage" style="width:50px" />
          </div>
        </div>
          <div class="col-md-6">
          <h6 class="my-0">Name: {{$cartItem->name}}</h6>
          <span class="text-muted">Price: {{$cartItem->price}}</span>
        </br>
          <small class="text-muted foat-right">Qty: {{$cartItem->qty}}</small>
        </div>
        </li>
          @endforeach
        <li class="list-group-item d-flex justify-content-between">
          <a class="btn btn-primary" href="{{url('/')}}/checkout">Check Out</a>
          <a class="btn btn-primary float-right" href="{{url('/cart')}}">View Cart</a>
        </li>
        </ul>
    </div>
    </div>
    </li>

    <form action="{{ route('search') }}" class="form-inline ml-auto" method="get">
      <div class="d-flex justify-content-between align-items-center">
      <input type="text" name="query" id="query" class="form-control mr-2" value="{{ request()->input('query') }}" placeholder="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      </div>
    </form>
  </ul>
</nav>
