<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @if($role_get->dashboard == 'on')
        <li class="dashboard nav-item">
            <a href="/admin/dashboard"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[0][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        @if($role_get->customers == 'on')
        <li class="customer nav-item">
            <a href="/admin/customer"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[13][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        @if($role_get->vendors == 'on')
        <li class="vendor nav-item">
            <a href="/admin/vendor"><i class="la la-link"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[21][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        @if($role_get->reviews == 'on')
        <li class="product-reviews nav-item">
            <a href="/admin/product-reviews"><i class="la la-star-o"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[31][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">{{$language[39][Auth::guard('admin')->user()->lang]}}</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>

        @if($role_get->product_category == 'on')
        <li class="category nav-item">
          <a href="/admin/category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[39][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        @if($role_get->professional_category == 'on')
        <li class="professional-category nav-item">
          <a href="/admin/professional-category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[46][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        @if($role_get->idea_category == 'on')
        <li class="idea-category nav-item">
          <a href="/admin/idea-category"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[53][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class="attributes nav-item">
          <a href="/admin/attributes"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[60][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="brand nav-item">
          <a href="/admin/brand"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[66][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        @if($role_get->city == 'on')
        <li class="city nav-item">
          <a href="/admin/city"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[73][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class="package nav-item">
          <a href="/admin/package"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[79][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">{{$language[87][Auth::guard('admin')->user()->lang]}}</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>

        @if($role_get->orders == 'on')
        <li class="orders nav-item">
          <a href="/admin/orders"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[88][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class="return-item nav-item">
          <a href="/admin/return-item"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">Return Item</span></a>
        </li>

        @if($role_get->settlement_report == 'on')
        <li class="payments-out-report nav-item">
          <a href="/admin/payments-out-report"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[96][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class=" navigation-header">
          <span data-i18n="nav.category.layouts">{{$language[105][Auth::guard('admin')->user()->lang]}}</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Layouts"></i>
        </li>

        @if($role_get->users == 'on')
        <li class="users nav-item">
            <a href="/admin/users"><i class="la la-user-plus"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[106][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif
        @if($role_get->roles == 'on')
        <li class="roles nav-item">
            <a href="/admin/roles"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[107][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class="mobile-ad nav-item">
            <a href="/admin/mobile-ad"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Mobile Ad</span></a>
        </li>

        <li class="return-reason nav-item">
            <a href="/admin/return-reason"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[108][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="about-us nav-item">
            <a href="/admin/about-us"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[109][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="purchase-guide nav-item">
            <a href="/admin/purchase-guide"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[110][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="vendor-guide nav-item">
            <a href="/admin/vendor-guide"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[111][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="professional-guide nav-item">
            <a href="/admin/professional-guide"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[112][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="delivery-information nav-item">
            <a href="/admin/delivery-information"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[113][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="settings nav-item">
            <a href="/admin/settings"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">Settings</span></a>
        </li>

        @if($role_get->terms_and_conditions == 'on')
        <li class="terms-and-conditions nav-item">
            <a href="/admin/terms-and-conditions"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[114][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif
        @if($role_get->privacy_policy == 'on')
        <li class="privacy-policy nav-item">
            <a href="/admin/privacy-policy"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[115][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>
        @endif

        <li class="languages nav-item">
            <a href="/admin/languages"><i class="la la-wrench"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[116][Auth::guard('admin')->user()->lang]}}</span></a>
        </li>

        <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="la la-sign-out"></i><span class="menu-title" data-i18n="nav.dash.main">{{$language[117][Auth::guard('admin')->user()->lang]}}</span>
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