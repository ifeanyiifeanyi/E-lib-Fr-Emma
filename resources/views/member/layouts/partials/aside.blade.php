<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset("") }}logo.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h5 class="logo-text">Dashboard</h5>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('member.dashboard') }}">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Books</div>
            </a>
        </li>
        @if (auth()->user()->pass_code > 0)
        <li>
            <a href="{{ route(" member.booksHistory.view") }}" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">History</div>
            </a>
        </li>
        @endif

    </ul>
    <!--end navigation-->
</div>