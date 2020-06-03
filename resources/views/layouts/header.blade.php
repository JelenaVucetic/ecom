<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" id="myNavbar">
  <a href="#">Eng</a>
  <a href="#">Mne</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          @if(Auth::check())
          <div class="hello-user">
            <p>Hello  {{ ucfirst(Auth::user()->name)  }} </p>
            <a href="/profile" data-placement="bottom" title="View your profile"><img src="/site-images/profil.svg" alt=""></a>
        {{--     <div class="dropdown-menu">
              <h1>dropdown</h1>
            </div> --}}
            
            <a class="dropdown-item" href="" data-toggle="dropdown" id="dropdownMenuButton" >Logout</a>       
            <div class="dropdown-menu closeDrop" aria-labelledby="dropdownMenuButton">
              <p>We are sorry you are logging <br> out.</p>
              <div class="logout-img">
                <img src="/site-images/Imoticon.svg" alt="">
              </div>
              <p>Are you sure?</p>
              <div class="yes-no">
                <a class="dropdown-item" href="{{ url('/logout') }}">Yes</a>
                <a href="" id="closeDropdown">No</a>
              </div>
            </div>
          </div>
          
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            
            @if(Auth::user()->isAdmin())
              <a class="dropdown-item" href="{{ url('/admin') }}">Admin</a>
            @else
            <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
            @endif
        </div>
          @else
              <a id="user-login" class="dropdown-item" href="{{ url('/login') }}">Login</a>
              <li class="list-inline-item"> <a  class="dropdown-item"  href="{{ route('register') }}">Signup</a> </li>
         @endif
      </li>
  </ul>
</nav>
