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
                    {{-- <b class="caret"></b> --}}
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    <small>{{ Auth::user()->hasRole('Admin') ? 'Admin':'User' }}</small>
                </div>
            </a>
        </li>
        {{-- <li>
            <ul class="nav nav-profile">
                <li><a href="javascript:;"><i class="ion-ios-cog-outline"></i> Settings</a></li>
                <li><a href="javascript:;"><i class="ion-ios-compose-outline"></i> Send Feedback</a></li>
                <li><a href="javascript:;"><i class="ion-ios-help-outline"></i> Helps</a></li>
            </ul>
        </li> --}}
    </ul>
    <!-- end sidebar user -->
    
    <!-- begin sidebar nav -->
    <ul class="nav">
        <li class="has-sub {{ Request::path() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="ion-ios-pulse-strong"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="has-sub {{ Request::path() == 'sublocation' ? 'active' : '' }}{{ Request::path() == 'supplier' ? 'active' : '' }}{{ Request::path() == 'department' ? 'active' : '' }}{{ Request::path() == 'category' ? 'active' : '' }}{{ Request::path() == 'product' ? 'active' : '' }}">
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
                <li class="has-sub {{ Request::path() == 'department' ? 'active' : '' }}{{ Request::path() == 'category' ? 'active' : '' }}{{ Request::path() == 'product' ? 'active' : '' }}">
                    <a href="javascript:;"><b class="caret"></b> Products Details</a>
                    <ul class="sub-menu">
                        <li class="{{ Request::path() == 'department' ? 'active' : '' }}"><a href="{{ route('department') }}">Departments</a></li>
                        <li class="{{ Request::path() == 'category' ? 'active' : '' }}"><a href="{{ route('category') }}">Categories</a></li>
                        <li class="{{ Request::path() == 'product' ? 'active' : '' }}"><a href="{{ route('product') }}">Products</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        <li class="has-sub {{ Request::path() == 'stock' ? 'active' : '' }}{{ Request::path() == 'purchase-order' ? 'active' : '' }}">
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
                {{-- <li><a href="">Stock Adjustment Note [SAN]</a></li> --}}
            </ul>
        </li>
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
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                {{-- <i class="ion-ios-gear-outline"></i> --}}
                <i class="ion-ios-person"></i>
                {{-- <i class="fa fa-user"></i> --}}
                <span>Users</span>
            </a>
            <ul class="sub-menu">
                <li><a href="page_blank.html">Users</a></li>
                <li><a href="page_with_footer.html">Page with Footer</a></li>
            </ul>
        </li>
        <!-- begin sidebar minify button -->
        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
        <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
</div>
<!-- end sidebar scrollbar -->