<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @if($role_get->dashboard == 'on')
        <li class="dashboard nav-item">
            <a href="/admin/dashboard"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        </li>
        @endif

        @if($role_get->customers == 'on')
        <li class="customer nav-item">
            <a href="/admin/customer"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">Customers</span></a>
        </li>
        @endif

        @if($role_get->vendors == 'on')
        <li class="vendor nav-item">
            <a href="/admin/vendor"><i class="la la-link"></i><span class="menu-title" data-i18n="nav.dash.main">Vendors</span></a>
        </li>
        @endif

        @if($role_get->reviews == 'on')
        <li class="product-reviews nav-item">
            <a href="/admin/product-reviews"><i class="la la-star-o"></i><span class="menu-title" data-i18n="nav.dash.main">Reviews</span></a>
        </li>
        @endif

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Category</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>

        @if($role_get->product_category == 'on')
        <li class="category nav-item">
          <a href="/admin/category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Product Category</span></a>
        </li>
        @endif

        @if($role_get->professional_category == 'on')
        <li class="professional-category nav-item">
          <a href="/admin/professional-category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Professional Category</span></a>
        </li>
        @endif

        @if($role_get->idea_category == 'on')
        <li class="idea-category nav-item">
          <a href="/admin/idea-category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Idea Category</span></a>
        </li>
        @endif

        <li class="attributes nav-item">
          <a href="/admin/attributes"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Attributes</span></a>
        </li>

        <li class="brand nav-item">
          <a href="/admin/brand"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Brand</span></a>
        </li>

        @if($role_get->city == 'on')
        <li class="city nav-item">
          <a href="/admin/city"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">City</span></a>
        </li>
        @endif

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Reports</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>


        @if($role_get->orders == 'on')
        <li class="orders nav-item">
          <a href="/admin/orders"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">Orders</span></a>
        </li>
        @endif

        @if($role_get->settlement_report == 'on')
        <li class="settlement-reports nav-item">
          <a href="#"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">Settlement Reports</span></a>
        </li>
        @endif

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Master</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>

        @if($role_get->users == 'on')
        <li class="users nav-item">
            <a href="/admin/users"><i class="la la-user-plus"></i><span class="menu-title" data-i18n="nav.dash.main">Users</span></a>
        </li>
        @endif
        @if($role_get->roles == 'on')
        <li class="roles nav-item">
            <a href="/admin/roles"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Roles</span></a>
        </li>
        @endif

        <li class="return-reason nav-item">
            <a href="/admin/return-reason"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Return Reason</span></a>
        </li>

        <li class="about-us nav-item">
            <a href="/admin/about-us"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">About Us</span></a>
        </li>

        <li class="purchase-guide nav-item">
            <a href="/admin/purchase-guide"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Purchase Guide</span></a>
        </li>

        <li class="vendor-guide nav-item">
            <a href="/admin/vendor-guide"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Vendor Guide</span></a>
        </li>

        <li class="professional-guide nav-item">
            <a href="/admin/professional-guide"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Professional Guide</span></a>
        </li>

        <li class="delivery-information nav-item">
            <a href="/admin/delivery-information"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Delivery Information</span></a>
        </li>

        @if($role_get->terms_and_conditions == 'on')
        <li class="terms-and-conditions nav-item">
            <a href="/admin/terms-and-conditions"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Terms and Conditions</span></a>
        </li>
        @endif
        @if($role_get->privacy_policy == 'on')
        <li class="privacy-policy nav-item">
            <a href="/admin/privacy-policy"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Privacy Policy</span></a>
        </li>
        @endif

        <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="la la-sign-out"></i><span class="menu-title" data-i18n="nav.dash.main">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </li>



        <!-- <li class=" navigation-header">
          <span data-i18n="nav.category.support">Support</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Support"></i>
        </li>
        <li class=" nav-item"><a href="http://support.pixinvent.com/"><i class="la la-support"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Raise Support</span></a>
        </li>
        <li class=" nav-item">
          <a href="https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/documentation"><i class="la la-text-height"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Documentation</span>
          </a>
        </li> -->
      </ul>
    </div>
</div>