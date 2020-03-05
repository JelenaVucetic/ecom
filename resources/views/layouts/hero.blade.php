<section class="jumbotron text-center">
    <div class="mycontainer">
        <div class="logo-section">
        <div class="logo-image">  
          <a href="/"> <img src="/site-images/U1.png" alt="Urban one">    </a>
        </div>

        <form action="{{ route('search') }}" class="form-inline ml-auto" method="get" >
            <div class="searchIDiv">
            <div class="searchI">
              <input type="text" name="query" id="query" class="" value="{{ request()->input('query') }}" placeholder="Search design and products" ><i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
          </form>
          <div style="display: flex; align-items: center;">
          <a class="nav-link" href="/wishlist" style='color:#231F20;'><i class="fa fa-heart-o fa-2x" ></i></a>
          <li class="nav-item dropdown" id="cart">
            <a class="nav-link " href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="dropdown-menu" aria-labelledby="dropdown01" id="dropdownCart" style="background:white; border: 1px solid lightgray;">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
              <span >Total: ({{Cart::total()}})</span>
            </h4>
            <h4>
             Your cart
            </h4>
          <ul class="list-group mb-3">
            <?php $cartItems = Cart::content();?>
                @foreach($cartItems as $cartItem)
            <li class="list-group-item">

                <img  class="dropdownimage" src="{{url('images',$cartItem->options->img)}}"  class="img-responsive dropdownimage" style="width:50px" />

              <h6>Name: {{$cartItem->name}}</h6>
              <span>Price: {{$cartItem->price}}</span>
            </br>
              <small>Qty: {{$cartItem->qty}}</small>

            </li>
              @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <a class="btn btn-primary" href="{{url('/')}}/checkout">Check Out</a>
              <a class="btn btn-primary float-right" href="{{url('/cart')}}">View Cart</a>
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
        
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a href="" style="color:#404040;"> {{ ucwords($category->name) }}</a> 
            </button>
            @if ($category->children)
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($category->children as $child)
                <a class="dropdown-item" href="{{route('category.show',$child->id)}}">{{ ucwords($child->name) }}</a>
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