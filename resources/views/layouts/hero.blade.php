<section class="jumbotron text-center">
    <div class="mycontainer">
        <div class="logo-section">
        <div class="logo-image">  
          <a href="/"> <img src="/site-images/U1.png" alt="Urban one">    </a>
        </div>

        <form action="{{ route('search') }}" class="form-inline ml-auto" method="get" >
            <div class="searchIDiv">
            <div class="searchI">
              <input type="text" name="query" id="query" class="" value="{{ request()->input('query') }}" placeholder="Search design and products" required><i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
          </form>
          <div class="hero-right">
          <a class="nav-link" href="/wishlist" style='color:#231F20;'><i class="fa fa-heart-o fa-2x" ></i></a>
            <li style="list-style:none;">
              <a  href="{{url('/cart')}}"><img style='width:30px;' src="/site-images/03 Shopping-cart.svg" alt=""></a> 
            </li>
            </ul>
         </div>
        </div>
        </div>
    </a>
        </li>
    
<div class="category">     
    <div style="display: flex;justify-content: space-around;" class="main-categories">
      @foreach($categories as $category)
        <div class="dropdown">
          <span  style="color:#404040;"> {{($category->name) }}</span>
          @if ($category->children)
            <div class="dropdown-content">
              @foreach ($category->children as $child)
              <a style=" color:#231f20!important;" href="{{route('category.show',$child->id)}}">{{($child->name) }}</a>
              @endforeach
            </div>
          @endif
        </div>
        @endforeach
        <div class="dropdown">
          <button class="btn " type="button" id="dropdownMenuButtonSpecialPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a href="" style="color:#404040;"> Special price</a> 
          </button> 
        </div>
    </div>
    </div>
  </section>