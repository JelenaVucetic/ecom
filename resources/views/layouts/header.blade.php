<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/shop">shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
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
    <li class="list-inline-item"> <a  href="/cart">View Cart({{ Cart::count() }})({{ Cart::total() }}) </a> </li>
   
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>