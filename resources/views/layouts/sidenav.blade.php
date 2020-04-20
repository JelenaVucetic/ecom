<nav class="navbar pmd-navbar fixed-top pmd-z-depth navbar-expand-md" id="mySideNav" style="display:none;">
    <div class="container-fluid"> 
    <!-- Sidebar Toggle Button-->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="display: flex;width: 75%;align-items: center;justify-content: space-between;">
    <a href="javascript:void(0);" data-target="basicSidebar" data-placement="left"
    data-position="fixed" is-open="true" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect float-left margin-r8 pmd-sidebar-toggle"
    is-open-width="1000"><i class="material-icons md-light" style="color:#231F20">menu</i></a>
    <i class="fa fa-search"></i>
    <a class="navbar-brand" href="/"><img src="/site-images/U1.png" alt="Urban one"></a>
  
    </div>
        <!-- Navbar Right icon -->
       <div class="pmd-ml-auto-icon float-right"> <a href="javascript:void(0);" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect"><i class="material-icons pmd-sm md-light">search</i></a>
        <a href=""><i class="fa fa-heart"></i></a>
        <a href=""><i class="fa fa-shopping-cart"></i></a>
        </div> 
        <!-- /.navbar-collapse -->
    </div>
        <!-- /.container-fluid -->
  </nav>
  <section id="pmd-main" style="display:none;">
  <div class="pmd-sidebar-overlay"></div>
    <!-- Left sidebar -->
    <aside id="basicSidebar" class="pmd-sidebar pmd-z-depth sidenav"
    role="navigation">
          <nav class="sidebar-nav">
            <ul>
            @foreach($categories as $category)
              <li>
                <a href="#"><i class="ion-bag"></i> <span>{{ ucwords($category->name) }}</span></a>
                @if($category->children)
                <ul class="nav-flyout">
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
              </li>
            </ul>
          </nav>
    </aside>
   
  </section>
    