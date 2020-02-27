<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="myNavbar">
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
      <li class="nav-item dropdown">
      <?php if(Auth::check()) {?>
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
          <?php } else { ?>
            <a class="dropdown-item"href="{{ url('/login') }}" style="background-color:white;">Login</a>
            <li class="list-inline-item"> <a  href="{{ route('register') }}">Signup</a> </li>
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


    
  </ul>
</nav>
