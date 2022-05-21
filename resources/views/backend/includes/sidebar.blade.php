    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>

    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">Dashboard</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="mailbox.html" class="br-menu-link">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">Mailbox</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
            <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub">
                    <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                    <span class="menu-item-label">Cards &amp; Widgets</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub">
                    <li class="sub-item"><a href="card-dashboard.html" class="sub-link">Dashboard</a></li>
                    <li class="sub-item"><a href="card-social.html" class="sub-link">Blog &amp; Social Media</a></li>
                    <li class="sub-item"><a href="card-listing.html" class="sub-link">Shop &amp; Listing</a></li>
                </ul>
            </li>
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-light">Admin</label>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/product*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-person-stalker tx-20"></i>
                <span class="menu-item-label">Product</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('product.index') }}" class="sub-link {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}">All Product</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('product.create') }}" class="sub-link {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}">Add Product</a>
                </li>
                <li class="sub-item">
                    <a href="#" class="sub-link">Add Stock</a>
                </li>
            </ul>
        </li>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/category*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-person-stalker tx-20"></i>
                <span class="menu-item-label">Category</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('category.index') }}" class="sub-link ">Categories</a>
                </li>
            </ul>
        </li>
        <li class="br-menu-item">
            <a href="{{ route('admin.blank') }}" class="br-menu-link {{ Request::is('admin/black')  == route('admin.blank') ? "active" : '' }}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Blank </span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->
    </div>
    <!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
