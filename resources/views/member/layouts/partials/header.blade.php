<div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
        <a href="{{ route('member.dashboard')}}" class="logo">Dashboard</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->





    <!-- Start Sidepanel Show-Hide Button -->
    <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a>
    <!-- End Sidepanel Show-Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">



        <li class="dropdown link">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img
                    src="{{asset(auth()->user()->photo)}}" alt="img"><b>{{ Str::title(auth()->user()->name) }}</b><span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                <li role="presentation" class="dropdown-header">Profile</li>

                <li><a href="{{ route('member.profile.view') }}"><i class="fa falist fa-file-o"></i>Profile</a></li>
                <li><a href="{{ route('member.updateDassword.view')}}"><i class="fa falist fa-wrench"></i>Settings</a></li>
                <li class="divider"></li>
                <li><a href="{{ route('member.logout') }}"><i class="fa falist fa-power-off"></i> Logout</a></li>
            </ul>
        </li>

    </ul>
    <!-- End Top Right -->

</div>
