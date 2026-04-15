{{-- Scrollable nav area --}}
<div class="flex-grow-1 overflow-auto py-3">

    {{-- GENERAL --}}
    <div class="mb-6">
        <div class="px-4 mb-3">
            <p class="text-muted fw-semibold text-uppercase fs-xs ls-wide">General</p>
        </div>
        <ul class="nav flex-column mb-3">
            <li class="nav-item ms-3">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs('admin.dashboard') ? 'active text-dark-blue' : 'text-gray' }} gap-2 px-4"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid-1x2"></i>
                    Dashboard
                </a>
            </li>
        </ul>
    </div>

    {{-- ITEMS DATA --}}
    <div class="mb-6">
        <div class="px-4 mb-3">
            <small class="text-muted fw-semibold text-uppercase fs-xs ls-wide">Items Data</small>
        </div>
        <ul class="nav flex-column mb-3">
            <li class="nav-item ms-3 mb-3">
                <a class="nav-link d-flex align-items-center gap-2 px-4 {{ request()->routeIs('admin.categories.*') ? 'active text-dark-blue' : 'text-gray' }}"
                    href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-tags"></i>
                    Categories
                </a>
            </li>
            <li class="nav-item ms-3">
                <a class="nav-link d-flex align-items-center gap-2 px-4 {{ request()->routeIs('admin.items.*') ? 'active text-dark-blue' : 'text-gray' }}"
                    href="{{ route('admin.items.index') }}">
                    <i class="bi bi-box-seam"></i>
                    Items
                </a>
            </li>
        </ul>
    </div>

    {{-- ACCOUNTS --}}
    <div class="mb-6">
        <div class="px-4 mb-3">
            <small class="text-muted fw-semibold text-uppercase fs-xs ls-wide">Accounts</small>
        </div>
        <ul class="nav flex-column mb-3">
            <li class="nav-item ms-3">
                <a class="nav-link d-flex align-items-center gap-2 px-4 text-grey" data-bs-toggle="collapse"
                    href="#usersSubmenu" role="button" aria-expanded="false" aria-controls="usersSubmenu">
                    <i class="bi bi-people"></i>
                    Users
                    <i class="bi bi-chevron-down ms-auto small"></i>
                </a>
                <div class="collapse mt-3" id="usersSubmenu">
                    <ul class="nav flex-column">
                        <li class="nav-item ms-3 mb-3">
                            <a class="nav-link d-flex align-items-center gap-2 ps-5 pe-4 text-grey {{ request()->routeIs('admin.accounts.admin.*') ? 'active text-dark-blue' : '' }}"
                                href="{{ route('admin.accounts.admin.index') }}">
                                <i class="bi bi-person-badge"></i>
                                Admin
                            </a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link d-flex align-items-center gap-2 ps-5 pe-4 text-grey {{ request()->routeIs('admin.accounts.staff.*') ? 'active text-dark-blue' : '' }}"
                                href="{{ route('admin.accounts.staff.index') }}">
                                <i class="bi bi-person-badge"></i>
                                Staff
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

</div>

{{-- LOGOUT --}}
<div class="border-top p-3">
    <form action="{{ route('logout') }}" onsubmit="return confirm('Are you sure want to log out?');" method="POST">
        @csrf
        <button type="submit"
            class="btn btn-sm w-100 d-flex align-items-center justify-content-center gap-2 text-danger">
            <i class="bi bi-box-arrow-left"></i>
            Log Out
        </button>
    </form>
</div>
