@include('modals.searchModal')

<nav class="navbar pmd-navbar fixed-top pmd-z-depth navbar-expand-md" id="mySideNav" style="display:none; padding:0;">
    <div class="container-fluid"> 
    <!-- Sidebar Toggle Button-->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="display: flex;width: 71%;align-items: center;justify-content: space-between;">
      <a href="javascript:void(0);" data-target="basicSidebar" data-placement="left"
      data-position="fixed" is-open="true" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect float-left margin-r8 pmd-sidebar-toggle"
      is-open-width="1000"><i class="material-icons md-light" style="color:#231F20">menu</i></a>
      <i class="fa fa-search" data-toggle="modal" data-target="#searchModal" style="margin-right: 30px;"></i>
      <a class="navbar-brand" href="/" style="margin-right: 0;"><img src="/site-images/U1.png" alt="Urban one"></a>
  
    </div>
        <!-- Navbar Right icon -->
       <div class="pmd-ml-auto-icon float-right" style="width: 95px">
        <div class="hero-right">
          <a class="nav-link" href="/wishlist" style='color:#231F20;'><i class="fa fa-heart-o fa-2x" ></i></a>
            <li style="list-style:none;">
              <div style='position: relative;'>
                <a  href="{{url('/cart')}}"><img style='width:30px;' src="/site-images/03 Shopping-cart.svg" alt="">
                <span id="number_cart_items_phone">{{ Cart::count() }}</span></a>         
              </div>        
            </li>
            </ul>
         </div>
        </div> 
        <!-- /.navbar-collapse -->
    </div>
        <!-- /.container-fluid -->
  </nav>
  <section id="pmd-main" style="display:none;">
  <div class="pmd-sidebar-overlay"></div>
    <!-- Left sidebar -->
    <aside id="basicSidebar" class="pmd-sidebar pmd-z-depth sidenav"
    role="navigation" style="z-index: 9999;">
          <nav class="sidebar-nav">
            <ul>     
              <li>
                @if (Auth::check())
                <a href="#"><img src="/avatars/{{ Auth::user()->avatar }}" alt="" style="width: 26px;height: 26px;object-fit: cover;border-radius: 50%;"> <span>{{ ucfirst(Auth::user()->name)  }}</span></a>
                @else 
                <div style="display: flex;">
                  <a href="{{ url('/login') }}">Login</a>
                  <a href="{{ route('register') }}">Signup</a>
                </div>        
                @endif
                @if (Auth::check())
                <ul class="nav-flyout" style="width: 83%;">            
                  <li>
                    <img src="/avatars/{{ Auth::user()->avatar }}" alt="" style="width: 90px;height: initial;object-fit: cover;">
                  </li>
                  
                  <li>
                    <a href="{{url('/profile')}}">My Orders</a>
                  </li>
                  <li> 
                    <a href="{{url('/wishlist')}}"><span>Wishlist</span> </a>
                  </li>
                  <li>
                    <a href="{{url('/address')}}" >My address</a>
                  </li>
                  <li>
                    <a href="{{url('/password')}}">Change Password</a>
                  </li>
                  <li>
                    <a href="{{url('/profile_image')}}">Your profil image</a>
                  </li>
                  <li>
                    <a href="{{ url('/logout') }}">Logout</a>
                  </li>
                </ul>
                @endif
              </li>  
              @foreach($categories as $category)
                <li>
                  <div style=" display: flex;">
                     <img src="/site-images/{{$category->image}}" alt="" style="width:50px;height: 50px;margin: auto 5px;object-fit: cover;">
                    <a href="#"><i class="ion-bag"></i> <span>{{ ucwords($category->name) }}</span></a>
                  </div>
                    @if($category->children)
                      <ul class="nav-flyout">
                        <li>
                          <img src="/site-images/{{$category->cover_image}}" alt="" style="width: 100%;">
                        </li>
                        <li>
                          <a  href="{{route('category.show',$category->id)}}"> All {{$category->name}}</a>
                        </li>
                        @foreach ($category->children as $child)
                          <li>
                            <a href="{{route('category.show',$child->id)}}"><i class="ion-ios-color-filter-outline"></i>{{ ucwords($child->name) }}</a>
                          </li>
                        @endforeach           
                      </ul>
                    @endif
                </li>
                @endforeach
              </ul>
          </nav>
    </aside>
   
  </section>
    