<!-- begin sidebar scrollbar -->
<div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
        <li class="nav-profile">
            <a href="{{ route('profile') }}">
                <div class="cover with-shadow"></div>
                <div class="image">
                    <img src="{{ route('image', ['filename' => Auth::user()->id . '-' . Auth::user()->first_name . '.jpg']) }}" alt="" />
                </div>
                <div class="info">
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    <small>{{  Auth::user()->role(Auth::user()->id) }}</small>
                </div>
            </a>
        </li>
    </ul>
    <!-- end sidebar user -->
    
    <!-- begin sidebar nav -->
    <ul class="nav">

        {{-- begin dashboard --}}
        <li class="has-sub {{ Request::path() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="ion-ios-pulse-strong"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- end dashboard --}}

        {{-- begin master details --}}
        <li class="has-sub {{ Request::path() == 'sublocation' ? 'active' : '' || Request::path() == 'supplier' ? 'active' : '' || Request::path() == 'department' ? 'active' : '' || Request::path() == 'category' ? 'active' : '' || Request::path() == 'product' ? 'active' : '' }}">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-briefcase-outline bg-gradient-purple"></i>
                <span>Master Details</span> 
            </a>
            <ul class="sub-menu">
                @if(Auth::user()->hasRole('Admin'))
                    <li class="{{ Request::path() == 'sublocation' ? 'active' : '' }}"><a href="{{ route('sublocation') }}">Sub Locations</a></li>
                @endif
                <li class="{{ Request::path() == 'supplier' ? 'active' : '' }}"><a href="{{ route('supplier') }}">Suppliers</a></li>
                <li class="has-sub {{ Request::path() == 'department' ? 'active' : '' || Request::path() == 'category' ? 'active' : '' || Request::path() == 'product' ? 'active' : '' }}">
                    <a href="javascript:;"><b class="caret"></b> Products Details</a>
                    <ul class="sub-menu">
                        <li class="{{ Request::path() == 'department' ? 'active' : '' }}"><a href="{{ route('department') }}">Departments</a></li>
                        <li class="{{ Request::path() == 'category' ? 'active' : '' }}"><a href="{{ route('category') }}">Categories</a></li>
                        <li class="{{ Request::path() == 'product' ? 'active' : '' }}"><a href="{{ route('product') }}">Products</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- end master details --}}

        {{-- begin inventory --}}
        <li class="has-sub {{ Request::path() == 'purchase-order' ? 'active' : '' }}">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-compose-outline bg-gradient-blue"></i>
                <span>Inventory</span>
            </a>
            <ul class="sub-menu">
                <li class="has-sub {{ Request::path() == 'purchase-order' ? 'active' : '' }}">
                    <a href="javascript:;"><b class="caret"></b>Purchase Order <b>[PO]</b></a>
                    <ul class="sub-menu">
                        <li class="{{ Request::path() == 'purchase-order' ? 'active' : '' }}"><a href="{{ route('purchase-order') }}">New PO</a></li>
                        <li><a href="">View All PO</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret"></b>Goods Receive Note <b>[GRN]</b></a>
                    <ul class="sub-menu">
                        <li><a href="">New GRN</a></li>
                        <li><a href="">View All GRN</a></li>
                    </ul>
                </li>
                <li class="{{ Request::path() == 'stock' ? 'active' : '' }}"><a href="{{ route('stock') }}">Stock Adjustment Note <b>[SAN]</b></a></li>
            </ul>
        </li>
        {{-- end inventory --}}

        {{-- begin reports --}}
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-stats-bars bg-gradient-orange"></i>
                <span>Reports</span>
            </a>
            <ul class="sub-menu">
                <li><a href="">Supplier Report</a></li>
            </ul>
        </li>
        {{-- end reports --}}

        {{-- begin user settings --}}
        <li class="has-sub {{ Request::path() == 'users' ? 'active' : '' }}">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-person"></i>
                <span>User Details</span>
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::path() == 'users' ? 'active' : '' }}"><a href="{{ route('users') }}">Users</a></li>
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret"></b> Permission</a>
                    <ul class="sub-menu">
                        <li class=""><a href="">Roles</a></li>
                        <li class=""><a href=""></a></li>
                        <li class=""><a href=""></a></li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- end user settings --}}

        {{-- begin settings --}}
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-gear-outline"></i>
                <span>Settings</span>
            </a>
            <ul class="sub-menu">
                <li><a href="#">Page with Footer</a></li>
            </ul>
        </li>
        {{-- end settings --}}

        <!-- begin sidebar minify button -->
        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
        <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
</div>
<!-- end sidebar scrollbar -->