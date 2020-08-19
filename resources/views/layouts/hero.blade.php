<section class="jumbotron text-center">
    <div class="mycontainer">
        <div class="logo-section">
          <div class="logo-image">  
            @if(Auth::check())
              @if(Auth::user()->isAdmin())
              <a href="/"> <img src="/site-images/U1.png" alt="Urban one"></a>
              @else
              <a href="/home"> <img src="/site-images/U1.png" alt="Urban one"></a>
              @endif
            @else
            <a href="/"> <img src="/site-images/U1.png" alt="Urban one"></a>
            @endif
          </div>
          @if(Request::path() === 'search')
          <form class="form-inline ml-auto">
            <div class="searchIDiv">
            <div class="searchI">
              <input type="text" name="query1" id="query1" class="" value="{{ request()->input('query1') }}" placeholder="Search design and products" required><i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
          </form>
         
          @else
          <form action="{{ route('search') }}" class="form-inline ml-auto" method="get" >
            <div class="searchIDiv">
            <div class="searchI">
              <input type="text" name="query" id="query" class="" value="{{ request()->input('query') }}" placeholder="Search design and products" required><i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
          </form>
          @endif
          <div class="hero-right">
            <a class="nav-link" href="/wishlist" style='color:#231F20;'><img style='width:35px;'  onmouseover="this.src='/site-images/4 Favorites - ikonica - HEADER - HOVER.svg'" onmouseout="this.src='/site-images/4 Favorites - ikonica - HEADER.svg'" src="/site-images/4 Favorites - ikonica - HEADER.svg" alt=""></i></a>
              <li style="list-style:none;">
                <div style="position: relative;width: 50px;">
                  <a  href="{{url('/cart')}}"><img style='width:35px;' src="/site-images/5 Shopping - cart - kolica.svg" alt="">
                    <span id="number_cart_items">{{ Cart::count() }}</span>
                  </a> 
                </div>            
              </li>
          </div>
    </div>
<div class="category">     
  <div style="display: flex;justify-content: space-around; align-items: center;" class="main-categories">
      @php
          $no = 1;
      @endphp
      @foreach($categories as $category)
      @php
        $string1 = (string) str_replace(' ', '', $category->name);
      @endphp
      <div class="dropdown">
        <button class="dropbtn"> {{ ($category->name) }}</button>
          @if ($category->children)
            <div class="dropdown-content">
            <a  href="{{route('category.show',[$category->id, $string1 => $no])}}" data-name="{{$category->name}}" data-id="{{$category->id}}"> All {{$category->name}}</a>
              @foreach ($category->children as $child)
                @php
                  $string = (string) str_replace(' ', '', $child->name);
                @endphp
                <a style=" color:#231f20!important;" class="child" href="{{route('category.show',[$child->id, $string => $no])}}" >{{($child->name) }}</a>
              @endforeach
            </div>      
          @endif
      </div>
          @php  $no++; @endphp
        @endforeach
        <div class="dropdown">
          <button class="dropbtn">Gifts</button>
          <div class="dropdown-content">
            <a href="/gifts_for_him">Gifts For Him</a>
            <a href="/gifts_for_her">Gifts For Her</a>
          </div>
        </div>
        <a href="/specialprice"> 
          <button class="btn " type="button" id="dropdownMenuButtonSpecialPrice" style="white-space: nowrap; text-transform:none;" >
            Special price
          </button> 
        </a> 
      </div>
  </div>
</section>