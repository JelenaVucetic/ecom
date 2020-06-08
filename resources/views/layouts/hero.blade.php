<section class="jumbotron text-center">
    <div class="mycontainer">
        <div class="logo-section">
          <div class="logo-image">  
            <a href="/"> <img src="/site-images/U1.png" alt="Urban one">    </a>
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
            <a class="nav-link" href="/wishlist" style='color:#231F20;'><i class="fa fa-heart-o fa-2x" ></i></a>
              <li style="list-style:none;">
                <a  href="{{url('/cart')}}"><img style='width:30px;' src="/site-images/03 Shopping-cart.svg" alt="">
                  <span id="number_cart_items">{{ Cart::count() }}</span>
                </a> 
              </li>
        </div>
    </div>
<div class="category">     
  <div style="display: flex;justify-content: space-around; align-items: center;" class="main-categories">
      @php
          $no = 0;
      @endphp
      @foreach($categories as $category)
      <div class="dropdown">
        <button class="dropbtn"> {{ ($category->name) }}</button>
        @if ($category->children)
          <div class="dropdown-content">
            @foreach ($category->children as $child)
            @php
              $string = (string) str_replace(' ', '', $child->name);
            @endphp
            <a style=" color:#231f20!important;" class="child" href="{{route('category.show',[$child->id, $string => $no])}}" >{{($child->name) }}</a>
            @endforeach
          </div>      
         @endif
      </div>
      @php
        $no++;
      @endphp
        @endforeach
      <div class="dropdown">
        <button class="btn " type="button" id="dropdownMenuButtonSpecialPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: none;">
        <a href="" style="color:#404040;"> Special price</a> 
        </button> 
      </div>
    </div>
  </div>
</section>