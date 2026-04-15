{{-- Scrollable nav area --}}
<div class="flex-grow-1 overflow-auto py-3">

    {{-- GENERAL --}}
    <div class="mb-6">
        <div class="px-4 mb-3">
            <p class="text-muted fw-semibold text-uppercase fs-xs ls-wide">General</p>
        </div>
        <ul class="nav flex-column mb-3">
            <li class="nav-item ms-3">
                <a class="nav-link d-flex align-items-center gap-2 px-4 {{ request()->routeIs('staff.dashboard') ? 'active text-dark-blue' : 'text-gray' }}"
                    href="{{ route('staff.dashboard') }}">
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
                <a class="nav-link d-flex align-items-center gap-2 px-4 {{ request()->routeIs('staff.items.*') ? 'active text-dark-blue' : 'text-gray' }}"
                    href="{{ route('staff.items.index') }}">
                    <i class="bi bi-box-seam"></i>
                    Items
                </a>
            </li>
            <li class="nav-item ms-3">
                <a class="nav-link d-flex align-items-center gap-2 px-4 {{ request()->routeIs('staff.lendings.*') ? 'active text-dark-blue' : 'text-gray' }}"
                    href="{{ route('staff.lendings.index') }}">
                    <i class="bi bi-tags"></i>
                    Lending
                </a>
            </li>
        </ul>
    </div>

    {{-- ACCOUNTS --}}
    <div class="mb-6">
        <div class="px-4 mb-3">
            <small class="text-muted fw-semibold text-uppercase fs-xs ls-wide">Account</small>
        </div>
        <ul class="nav flex-column mb-3">
            <li class="nav-item ms-3">
                <a class="nav-link d-flex align-items-center gap-2 px-4 {{ request()->routeIs('staff.accounts.edit') ? 'actve text-dark-blue' : 'text-gray' }}"
                    href="{{ route('staff.accounts.edit', Auth::user()->id) }}">
                    <i class="bi bi-person"></i>
                    User
                </a>
            </li>
        </ul>
    </div>

</div>

{{-- LOGOUT --}}
<div class="border-top p-3">
    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure want to log out?');">
        @csrf
        <button type="submit"
            class="btn btn-sm w-100 d-flex align-items-center justify-content-center gap-2 text-danger">
            <i class="bi bi-box-arrow-left"></i>
            Log Out
        </button>
    </form>
</div>
