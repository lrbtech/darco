<div class="translate dashboard-menu">
    <ul class="nav flex-column" role="tablist">
        <!-- <li class="nav-item">
            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link profile" href="/customer/profile"><i class="fi-rs-user mr-10"></i>Account details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link orders" href="/customer/orders"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
        </li>

        <li class="nav-item">
            <a class="nav-link return-item" href="/customer/return-item"><i class="fi-rs-shopping-bag mr-10"></i>Return Item</a>
        </li>

        <li class="nav-item">
            <a class="nav-link enquiry" href="/customer/enquiry"><i class="fi-rs-shopping-bag mr-10"></i>Enquiry</a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link manage-address" href="/customer/manage-address"><i class="fi-rs-marker mr-10"></i>My Address</a>
        </li>
        <li class="nav-item">
            <a class="nav-link change-password" href="/customer/change-password"><i class="fi-rs-user mr-10"></i>Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
        </li>
    </ul>
</div>