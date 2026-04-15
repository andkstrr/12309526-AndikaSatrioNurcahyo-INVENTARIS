{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExample"
            aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <img src="{{ asset('assets/logo/WikVentoryPrimary.png') }}" width="40" class="me-6" />
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="navbar-nav me-auto mb-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#features">Features</a>
                </li>
            </ul>
            <div class="d-flex align-items-center flex-column flex-lg-row">
                <a class="btn bg-dark-blue text-white" href="/login">Sign in</a>
            </div>
        </div>
    </div>
</nav>
