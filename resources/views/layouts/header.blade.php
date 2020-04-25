<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="myNavbar">
  <a href="#">Eng</a>
  <a href="#">Mne</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
      <?php if(Auth::check()) {?>
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
          <?php } else { ?>
            <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
            <li class="list-inline-item"> <a  class="dropdown-item"  href="{{ route('register') }}">Signup</a> </li>
          <?php } ?>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php if(Auth::check()) {?>
            <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>

                 @if(Auth::user()->isAdmin())
                 <a class="dropdown-item" href="{{ url('/admin') }}">Admin</a>
                @else
            <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
          @endif
        
          <?php } else { ?>
            <a class="dropdown-item" href="{{ url('/login') }}">Login</a>
          <?php } ?>
        </div>
      </li>


    
  </ul>
</nav>
