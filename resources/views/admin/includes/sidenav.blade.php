<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item admin-nav">
        <a class="nav-link active" href="/admin">
            <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item admin-nav ">
        <a class="nav-link" href="{{route('product.index')}}">
            <span data-feather="shopping-cart"></span>
            Products
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="{{route('product.create')}}">
            <span data-feather="shopping-cart"></span>
           Add Products
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="{{route('category.index')}}">
            <span data-feather="layers"></span>
           Categories
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="{{route('category.create')}}">
            <span data-feather="shopping-cart"></span>
           Add Category
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="{{route('tag.index')}}">
            <span data-feather="layers"></span>
           Tag
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="/admin/work">
            <span data-feather="layers"></span>
          Work
        </a>
        </li>
        <li class="nav-item admin-nav">
            <a class="nav-link" href="/admin/designs">
                <span data-feather="layers"></span>
              Designs
            </a>
            </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
        </a>
    </h6>
    <ul class="nav flex-column mb-2">
        <li class="nav-item admin-nav">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Current month
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Last quarter
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Social engagement
        </a>
        </li>
        <li class="nav-item admin-nav">
        <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Year-end sale
        </a>
        </li>
    </ul>
    </div>
</nav>