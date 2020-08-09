<nav class="navbar navbar-expand-md" id="myNavbar">
    <div style="width: 80%; margin: 0 auto;display: flex;">
        <a href="#">Eng</a>
        <a href="#">Mne</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown"  style="min-width: 50px!important;">

              @if(Auth::check())

                @if(Auth::user()->isAdmin())
                <a  href="{{ url('/admin') }}">Admin</a>
                <a href="{{ url('/logout') }}">Logout</a>
                @else
                <div class="hello-user">
                  <p>Hello  {{ ucfirst(Auth::user()->name)  }} </p>
                  <a href="/profile" data-placement="bottom" title="View your profile"><img src="/avatars/{{ Auth::user()->avatar }}" alt="" style="width: 26px;height: 26px;object-fit: cover;border-radius: 50%;"></a>

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
                @endif
              @else
                  <a id="user-login" class="dropdown-item" href="{{ url('/login') }}" style="min-width: 50px!important;">Login</a>
                  <li class="list-inline-item"> <a  class="dropdown-item"  href="{{ route('register') }}">Signup</a> </li>
             @endif
          </li>
      </ul>
  </div>
</nav>
