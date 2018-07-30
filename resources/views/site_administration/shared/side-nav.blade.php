<!-- begin sidebar scrollbar -->
<div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
        <li class="nav-profile">
            <a href="">
                <div class="cover with-shadow"></div>
                <div class="image">
                    <img src="{{ route('image', ['filename' => Auth::user()->id . '-' . Auth::user()->first_name . '.jpg']) }}" alt="" />
                </div>
                <div class="info">
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    <small>Site Admin</small>
                </div>
            </a>
        </li>
    </ul>
    <!-- end sidebar user -->
    
    <!-- begin sidebar nav -->
    <ul class="nav">

        {{-- begin dashboard --}}
        <li class="has-sub {{ Request::path() == 'site.dashboard' ? 'active' : '' }}">
            <a href="{{ route('site.dashboard') }}">
                <i class="ion-ios-pulse-strong"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- end dashboard --}}

        {{-- begin master details --}}
        <li class="has-sub {{ Request::path() == 'site.clients' ? 'active' : '' }}">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-briefcase-outline bg-gradient-purple"></i>
                <span>Clients Details</span> 
            </a>
            <ul class="sub-menu">
                <li class="{{ Request::path() == 'site.clients' ? 'active' : '' }}"><a href="{{ route('site.clients') }}">Clients</a></li>
            </ul>
        </li>
        {{-- end master details --}}

        {{-- begin reports --}}
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-stats-bars bg-gradient-orange"></i>
                <span>Reports</span>
            </a>
            <ul class="sub-menu">
                <li class="#"><a href="">Client Reports</a></li>
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret"></b>Master Reports </a>
                    <ul class="sub-menu">
                        <li class="#"><a href="">Supplier List Report</a></li>
                        <li class="#"><a href="">Department List Report</a></li>
                        <li class="#"><a href="">Category List Report</a></li>
                        <li class="has-sub">
                            <a href="javascript:;"><b class="caret"></b>Product Reports </a>
                            <ul class="sub-menu">
                                <li class="#"><a href="">Department Wise Product Report</a></li>
                                <li class="#"><a href="">Category Wise Product Report</a></li>
                                <li class="#"><a href="">Supplier Wise Product Report</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        {{-- end reports --}}

        <!-- begin sidebar minify button -->
        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
        <!-- end sidebar minify button -->
    </ul>
    <!-- end sidebar nav -->
</div>
<!-- end sidebar scrollbar -->