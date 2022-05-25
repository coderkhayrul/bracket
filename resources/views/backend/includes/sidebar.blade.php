    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Mostakim  <i>Billah</i><span>]</span></a></div>

    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">Dashboard</span>
                </a><!-- br-menu-link -->
            </li><!-- br-menu-item -->
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-light">Admin</label>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/product*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Product</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('product.index') }}" class="sub-link {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}">All Product</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('product.create') }}" class="sub-link {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}">Add Product</a>
                </li>
            </ul>
        </li>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/category*') ? 'active' : '' }}">
                <i class=" menu-item-icon icon ion-navicon-round tx-20"></i>
                <span class="menu-item-label">Category</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('category.index') }}" class="sub-link ">Categories</a>
                </li>
            </ul>
        </li>

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/sub-category*') ? 'active' : '' }}">
                <i class=" menu-item-icon icon ion-navicon-round tx-20"></i>
                <span class="menu-item-label">Sub Category</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('sub-category.index') }}" class="sub-link {{ Route::currentRouteName() == 'sub-category.index' ? 'active' : '' }}">All Sub-Category</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('sub-category.create') }}" class="sub-link {{ Route::currentRouteName() == 'sub-category.create' ? 'active' : '' }}">Add Sub Category</a>
                </li>
            </ul>
        </li>

        {{-- <li class="br-menu-item">
            <a href="{{ route('admin.blank') }}" class="br-menu-link {{ Request::is('admin/black')  == route('admin.blank') ? "active" : '' }}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Blank </span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item --> --}}
    </div>
    <!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
