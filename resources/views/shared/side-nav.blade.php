<!-- begin sidebar scrollbar -->
<div data-scrollbar="true" data-height="100%">
    <!-- begin sidebar user -->
    <ul class="nav">
        <li class="nav-profile">
            <a href="javascript:;" data-toggle="nav-profile">
                <div class="cover with-shadow"></div>
                <div class="image">
                    <img src="{{ route('image', ['filename' => Auth::user()->id . '-' . Auth::user()->first_name . '.jpg']) }}" alt="" />
                </div>
                <div class="info">
                    <b class="caret"></b>
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    <small>{{ Auth::user()->hasRole('Admin') ? 'Admin':'User' }}</small>
                </div>
            </a>
        </li>
        <li>
            <ul class="nav nav-profile">
                <li><a href="javascript:;"><i class="ion-ios-cog-outline"></i> Settings</a></li>
                <!-- <li><a href="javascript:;"><i class="ion-ios-compose-outline"></i> Send Feedback</a></li>
                <li><a href="javascript:;"><i class="ion-ios-help-outline"></i> Helps</a></li> -->
            </ul>
        </li>
    </ul>
    <!-- end sidebar user -->
    
    <!-- begin sidebar nav -->
    <ul class="nav">
        <li class="has-sub active">
            <a href="/dashboard">
                <i class="ion-ios-pulse-strong"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-briefcase-outline bg-gradient-purple"></i>
                <span>Master Details</span> 
            </a>
            <ul class="sub-menu">
                @if(Auth::user()->hasRole('Admin'))
                <li><a href="{{ route('sublocation') }}">Sub Locations Master</a></li>
                @endif
                <li><a href="">Department Master</a></li>
                <li><a href="">Category Master</a></li>
                <li><a href="{{ route('supplier.category') }}">Supplier Category</a></li>
                <li><a href="{{ route('supplier') }}">Supplier Master</a></li>
                <li><a href="">Customer Master</a></li>
                <li><a href="">Customer Master</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-compose-outline bg-gradient-blue"></i>
                <span>Inventory</span>
            </a>
            <ul class="sub-menu">
                <li><a href="table_basic.html">Basic Tables</a></li>
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret"></b> Managed Tables</a>
                    <ul class="sub-menu">
                        <li><a href="table_manage.html">Default</a></li>
                        <li><a href="table_manage_autofill.html">Autofill</a></li>
                        <li><a href="table_manage_buttons.html">Buttons</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-stats-bars bg-gradient-orange"></i>
                <span>Reports</span>
            </a>
            <ul class="sub-menu">
                <li><a href="">Supplier Master Reports</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="javascript:;">
                <b class="caret"></b>
                <i class="ion-ios-gear-outline"></i>
                <span>Page Options</span>
            </a>
            <ul class="sub-menu">
                <li><a href="page_blank.html">Blank Page</a></li>
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