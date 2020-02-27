<section class="jumbotron text-center">
    <div class="container">
        <div class="logo-section">
        <div class="logo-image">  
        <img src="/site-images/U1.png" alt="Urban one">    
        </div>

        <form action="{{ route('search') }}" class="form-inline ml-auto" method="get" >
            <div class="d-flex justify-content-between align-items-center searchI">
            <input type="text" name="query" id="query" class="" value="{{ request()->input('query') }}" placeholder="Search" ><i class="fa fa-search" aria-hidden="true"></i>

            <button class="btn btn-outline-success" type="submit">Search</button>
            </div>
          </form>
         
          <li class="nav-item dropdown" id="cart">
            <a class="nav-link " href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           {{--  <a class="nav-link " href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> Cart:{{Cart::count()}}</a> --}}
            <div class="dropdown-menu" aria-labelledby="dropdown01" id="dropdownCart" style="width:350px;">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
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
                <a class="dropdown-item" href="{{url('/show_category_product')}}/{{$child->id}}">{{ ucwords($child->name) }}</a>
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