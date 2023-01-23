<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}"">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category.index') }}">
            <span data-feather="file"></span>
            Categories
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('product.index') }}">
            <span data-feather="shopping-cart"></span>
            Products
          </a>
        </li>
      </ul>
    </div>
  </nav>
