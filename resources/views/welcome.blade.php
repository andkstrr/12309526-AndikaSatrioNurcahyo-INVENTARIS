<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wikrama Inventory</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>
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
                    <a class="btn bg-dark-blue text-white" href="{{ route('login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        {{-- HERO SECTION --}}
        <section id="hero">
            <div class="d-flex flex-column gap-3 justify-content-center align-items-center px-6 py-12">
                <h2 class="h2 text-center fw-bold">Inventory Management of <br /> Wikrama Vocational High School
                </h2>
                <p class="text-dark fs-sm fw-medium text-center">Monitor, manage, and integrate all inventory data more
                    easily and quickly.</p>
                <img src="{{ asset('assets/images/inventory-management.png') }}" alt="Inventory Management"
                    width="650" class="img-fluid"">
            </div>
        </section>
    </main>

    {{-- FOOTER --}}
    <footer id="footer">
        <div class="container py-8">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-6 mb-5">
                    <div class="d-flex flex-column justify-content-start align-items-start">
                        <div class="d-flex flex-row align-items-center">
                            <img src="{{ asset('assets/logo/WikVentoryWhite.png') }}" alt="WikVentory"
                                style="width: 50px; height: 50px; object-fit: contain;">

                            <img src="{{ asset('assets/logo/Wikrama.webp') }}" alt="Wikrama"
                                style="width: 50px; height: 50px; object-fit: contain;">
                        </div>

                        <div class="d-flex flex-column justify-content-start align-items-start">
                            <p class="text-white text-sm mb-0 mt-3">wikventory.smkwikrama.sch.id</p>
                            <p class="text-white text-sm">(0251) 8242411</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <h5 class="h5 text-white mb-7">Our Guidelines</h5>
                    <ul class="d-flex flex-column gap-2 list-unstyled">
                        <li><a href="#"
                                class="text-gray text-white-hover underline-none text-decoration-none">Terms</a></li>
                        <li><a href="#"
                                class="text-gray text-white-hover underline-none text-decoration-none">Privacy
                                Policy</a></li>
                        <li><a href="#"
                                class="text-gray text-white-hover underline-none text-decoration-none">Cookie Policy</a>
                        </li>
                        <li><a href="#"
                                class="text-gray text-white-hover underline-none text-decoration-none">Discover</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-3 col-lg-3 mb-5">
                    <h5 class="h5 text-white mb-7">Reach Us</h5>
                    <div class="d-flex flex-row gap-3">
                        <a href="https://www.instagram.com/andkstrr_/" target="_blank"
                            class="text-gray text-white-hover fs-5">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://github.com/andkstrr/WikVentoryUKK" target="_blank"
                            class="text-gray text-white-hover fs-5">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="https://linkedin.com/in/andkstrr" target="_blank"
                            class="text-gray text-white-hover fs-5">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
