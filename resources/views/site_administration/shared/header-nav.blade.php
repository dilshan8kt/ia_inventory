<div id="header" class="header navbar-inverse">
    <!-- begin navbar-header -->
    <div class="navbar-header">
        <a href="" class="navbar-brand">
            <span class="navbar-logo">
                <img src="{{ asset('logo/logo_onwhite.png') }}" style="margin-top: -11px; width: 28px;margin-left: -11px;">
            </span><b>Intel</b> Access</a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- end navbar-header -->
    
    <ul class="navbar-nav navbar-right">
        <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
               <img src="{{ route('image', ['filename' => Auth::user()->id . '-' . Auth::user()->first_name . '.jpg']) }}" alt="" /> 
                <span class="d-none d-md-inline"> {{Auth::user()->username}}</span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="" class="dropdown-item">Edit Profile</a>
                <a href="javascript:;" class="dropdown-item">Calendar</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('signout') }}" class="dropdown-item">Log Out</a>
            </div>
        </li>
    </ul>
    <!-- end header navigation right -->
</div>
