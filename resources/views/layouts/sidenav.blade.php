<nav class="navbar navbar-dark bg-dark pmd-navbar fixed-top pmd-z-depth navbar-expand-md" id="mySideNav" style="display:none;">
    <div class="container-fluid"> 
    <!-- Sidebar Toggle Button-->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <a href="javascript:void(0);" data-target="basicSidebar" data-placement="left"
    data-position="fixed" is-open="true" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect float-left margin-r8 pmd-sidebar-toggle"
    is-open-width="1000"><i class="material-icons md-light">menu</i></a>
    <a
    class="navbar-brand" href="javascript:void(0);">Brand</a>
    </div>
        <!-- Navbar Right icon -->
      {{--   <div class="pmd-ml-auto-icon float-right"> <a href="javascript:void(0);" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect"><i class="material-icons pmd-sm md-light">search</i></a>
            <a
            href="javascript:void(0);" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect topbar-toggle d-block d-sm-none-inline-block"
            data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><i class="material-icons pmd-sm">more_vert</i>
                </a>
        </div> --}}
        <!-- /.navbar-collapse -->
    </div>
        <!-- /.container-fluid -->
  </nav>
  <section id="pmd-main" style="display:none;">
    <!-- Left sidebar -->
    <aside id="basicSidebar" class="pmd-sidebar sidebar-dark pmd-z-depth"
    role="navigation">
        <ul class="nav pmd-sidebar-nav">
            <!-- My Account -->
            
                @foreach($categories as $category)
                <div class="dropdown side-dropdown">
                    <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a href="" style="color:#404040;"> {{ ucwords($category->name) }}</a> 
                    </button>
                    @if ($category->children)
                    <div class="dropdown-menu dropdown-relative" aria-labelledby="dropdownMenuButton" style="background:white; color:#231f20!important">
                    @foreach ($category->children as $child)
                        <a class="dropdown-item" style=" color:#231f20!important;" href="{{route('category.show',$child->id)}}">{{ ucwords($child->name) }}</a>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
                
            
            <li class="nav-item"> <a class="pmd-ripple-effect nav-link" href="javascript:void(0);"><i class="material-icons media-left media-middle">delete</i> <span class="media-body">Trash</span></a> 
            </li>
            <li class="nav-item"> <a class="pmd-ripple-effect nav-link" href="javascript:void(0);"><i class="material-icons media-left media-middle">notifications</i> <span class="media-body">Spam</span></a> 
            </li>
            <li class="nav-item"> <a class="pmd-ripple-effect nav-link" href="javascript:void(0);"><i class="material-icons media-left media-middle">notifications</i> <span class="media-body">Follow Up</span></a> 
            </li>
        </ul>
    </aside>
   
  </section>
    