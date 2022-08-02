<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dashboard nav-item">
          <a class="nav-link" href="/vendor/dashboard"><i class="la la-home"></i>
            <span>Dashboard</span>
          </a>
        </li>

        @if(Auth::guard('vendor')->user()->business_type == '0')
          <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-shopping-cart"></i><span>Products</span></a>
          <ul class="dropdown-menu">
            <!-- <li class="dropdown"><a class="dropdown-item" href="/vendor/attributes">Attributes</a></li> -->
            <li class="dropdown"><a class="dropdown-item" href="/vendor/product-group">Product Groups</a></li>
            <li class="dropdown"><a class="dropdown-item" href="/vendor/product">Product</a></li>
          </ul>
        </li>
        <!-- <li class="product nav-item">
          <a class="nav-link" href="/vendor/product"><i class="la la-shopping-cart"></i>
            <span>Products</span>
          </a>
        </li> -->

        <li class="coupon nav-item">
          <a class="nav-link" href="/vendor/coupon"><i class="la la-money"></i>
            <span>Coupons</span>
          </a>
        </li>

        <li class="orders nav-item">
          <a class="nav-link" href="/vendor/orders"><i class="la la-cart-plus"></i>
            <span>Orders</span>
          </a>
        </li>

        @else 

        <li class="profile nav-item">
          <a class="nav-link" href="/vendor/profile"><i class="la la-user"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li class="about-us nav-item">
          <a class="nav-link" href="/vendor/about-us"><i class="la la-users"></i>
            <span>About Us</span>
          </a>
        </li>
        <li class="project nav-item">
          <a class="nav-link" href="/vendor/project"><i class="la la-image"></i>
            <span>Projects</span>
          </a>
        </li>
        <li class="idea-book nav-item">
          <a class="nav-link" href="/vendor/idea-book"><i class="la la-image"></i>
            <span>Idea Book</span>
          </a>
        </li>
        <li class="enquiry nav-item">
          <a class="nav-link" href="/vendor/enquiry"><i class="la la-star"></i>
            <span>Enquiries</span>
          </a>
        </li>
        @endif

        <li class="product-reviews nav-item">
          <a class="nav-link" href="/vendor/product-reviews"><i class="la la-star"></i>
            <span>Reviews</span>
          </a>
        </li>

        <li class=" nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="la la-sign-out"></i>
            <span>Logout</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        </li>
        <!-- <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="la la-television"></i><span>Templates</span></a>
          <ul class="dropdown-menu">
            <li class="dropdown"><a class="dropdown-item" href="#">Vertical</a></li>
            <li class="dropdown"><a class="dropdown-item" href="#">Vertical</a></li>
          </ul>
        </li> -->
        
      </ul>
    </div>
</div>