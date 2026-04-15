<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard') - WikVentory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- MOBILE OFFCANVAS SIDEBAR --}}
    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarOffcanvas"
        aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header border-bottom">
            <a href="/" class="text-decoration-none">
                <img src="{{ asset('assets/logo/WikVentoryPrimaryLS.png') }}" alt="WikVentory" height="32">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        @if (Auth::user()->role == 'admin')
             {{-- ADMIN SIDEBAR MENU --}}
             <div class="offcanvas-body p-0 d-flex flex-column">
                @include('layouts.partials.sidebar-menu-admin')
            </div>
        @elseif (Auth::user()->role == 'staff')
             {{-- STAFF SIDEBAR MENU --}}
             <div class="offcanvas-body p-0 d-flex flex-column">
                @include('layouts.partials.sidebar-menu-staff')
            </div>
        @endif
    </div>

    {{-- MAIN LAYOUT --}}
    <div class="layout">
        {{-- MAIN CONTENT --}}
        <main class="layout-main d-flex flex-column">
            {{-- NAVBAR --}}
            <nav class="navbar border-bottom px-4 py-3">
                <div class="d-flex align-items-center gap-3 w-100">

                    {{-- BURGER --}}
                    <button class="btn btn-sm d-lg-none p-0 border-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
                        <i class="bi bi-list fs-4"></i>
                    </button>

                    {{-- PAGE TITLE --}}
                    <h5 class="mb-0 fw-semibold">@yield('section')</h5>

                    {{-- Right side spacer (can add user profile / notifications here later) --}}
                    <div class="ms-auto">
                        <div class="d-flex flex-row gap-2">
                            <div class="d-flex flex-column align-items-end">
                                <p class="mb-0 fs-sm fw-semibold text-end">Andika Satrio Nurcahyo</p>
                                <p class="mb-0 fs-xs text-muted">Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            {{-- CONTENT PAGE --}}
            <div class="px-3 py-6 flex-grow-1">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>

        {{-- DESKTOP SIDEBAR --}}
        <aside class="layout-sidebar border-end d-none d-lg-flex flex-column" style="width: 260px;">
            {{-- LOGO --}}
            <div class="px-4 py-3 border-bottom">
                <a href="/" class="text-decoration-none">
                    <img src="{{ asset('assets/logo/WikVentoryPrimaryLS.png') }}" alt="WikVentory" height="37">
                </a>
            </div>
            @if (Auth::user()->role == 'admin')
                @include('layouts.partials.sidebar-menu-admin')
            @elseif (Auth::user()->role == 'staff')
                @include('layouts.partials.sidebar-menu-staff')
            @endif
        </aside>
    </div>
</body>

</html>
