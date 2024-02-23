@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<style>
    .active {
        background-image: linear-gradient(76deg, #fc7575b6, #fd9999, #965353) !important;
        border-radius: 10px !important;
    }

    .active>a {
        color: #000 !important;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset("") }}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ asset(auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Str::title(auth()->user()->name) }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-close">
                    <a href="{{ route('admin.book.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Books Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ $route == 'admin.book.create' ? 'active shadow' : '' }}">
                            <a href="{{ route('admin.book.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add New Book</p>
                            </a>
                        </li>
                        <li class="nav-item  {{ $route == 'admin.book.view' ? 'active shadow' : '' }}">
                            <a href="{{ route('admin.book.view') }}" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>Manage Books</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-close">
                    <a href="{{ route('admin.book.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>
                            Activation Code Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ $route == 'admin.activationCode.view' ? 'active shadow' : '' }}">
                            <a href="{{ route('admin.activationCode.view') }}" class="nav-link">
                                <i class="fas fa-code nav-icon"></i>
                                <p>Manage Codes</p>
                            </a>
                        </li>
                        <li class="nav-item  {{ $route == 'admin.activationCode.create' ? 'active shadow' : '' }}">
                            <a href="{{ route('admin.activationCode.create') }}" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Generate New Codes</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ $route == 'admin.category.index' ? 'active shadow' : '' }}">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Manage Category
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ $route == 'admin.tag.view' ? 'active' : '' }}">
                    <a href="{{ route('admin.tag.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Manage Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-3 {{ $route == 'admin.genre.view' ? 'active' : '' }}">
                    <a href="{{ route('admin.genre.view') }}" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Manage Genre
                        </p>
                    </a>
                </li>
                <li class="nav-item bg-danger">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-backspace"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
