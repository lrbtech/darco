<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dashboard nav-item">
            <a href="/admin/dashboard"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
        </li>

        <li class="customer nav-item">
            <a href="/admin/customer"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">Customers</span></a>
        </li>

        <li class="vendor nav-item">
            <a href="/admin/vendor"><i class="la la-link"></i><span class="menu-title" data-i18n="nav.dash.main">Vendors</span></a>
        </li>

        <li class="reviews nav-item">
            <a href="/admin/reviews"><i class="la la-star-o"></i><span class="menu-title" data-i18n="nav.dash.main">Reviews</span></a>
        </li>

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Category</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>

        <li class="category nav-item">
          <a href="/admin/category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Product Category</span></a>
        </li>

        <li class="professional-category nav-item">
          <a href="/admin/professional-category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Professional Category</span></a>
        </li>

        <li class="idea-category nav-item">
          <a href="/admin/idea-category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">Idea Category</span></a>
        </li>

        <li class="city nav-item">
          <a href="/admin/city"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">City</span></a>
        </li>

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Reports</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>


        <li class="orders nav-item">
          <a href="/admin/orders"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">Orders</span></a>
        </li>

        <li class="settlement-reports nav-item">
          <a href="#"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">Settlement Reports</span></a>
        </li>

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">Master</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>


        <li class="users nav-item">
            <a href="/admin/users"><i class="la la-user-plus"></i><span class="menu-title" data-i18n="nav.dash.main">Users</span></a>
        </li>

        <li class="roles nav-item">
            <a href="#"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Roles</span></a>
        </li>

        <li class="terms-and-conditions nav-item">
            <a href="/admin/terms-and-conditions"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Terms and Conditions</span></a>
        </li>

        <li class="privacy-policy nav-item">
            <a href="/admin/privacy-policy"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Privacy Policy</span></a>
        </li>

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