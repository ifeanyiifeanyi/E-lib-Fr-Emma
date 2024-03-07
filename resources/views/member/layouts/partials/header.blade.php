<header>
    <div class="topbar d-flex align-items-center">
        <nav class="gap-3 navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            @if (auth()->user()->pass_code === 0)

            @else


            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="px-5 form-control" disabled type="search" placeholder="Search" value="">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>
            @endif

            <div class="top-menu ms-auto">
                <ul class="gap-1 navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown"><span class=""></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title"></p>
                                    <p class="msg-header-badge"></p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                        
                        
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Notifications</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class=""></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                </div>
                            </a>
                            <div class="header-message-list">
                                
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <div class="mb-3 d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Total</h5>
                                        <h5 class="mb-0 ms-auto">$489.00</h5>
                                    </div>
                                    <button class="btn btn-primary w-100">Checkout</button>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="px-3 user-box dropdown">
                <a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset(auth()->user()->photo) }}" class="user-img" alt="user avatar" />
                    <div class="user-info">
                        <p class="mb-0 user-name">{{ Str::title(auth()->user()->name) }}</p>
                        <p class="mb-0 designattion">{{ Str::lower(auth()->user()->email) }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('member.profile.view') }}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ route('member.updatePassword.view') }}"><i
                                class="bx bx-cog fs-5"></i><span>Settings</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('member.dashboard') }}"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>

                    <li>
                        <div class="mb-0 dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('member.logout') }}"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</header>