<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to WikVentory</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="card shadow-sm border-0 rounded-md" style="width: 100%; max-width: 500px;">
            <div class="card-body px-10 py-12">
                <div class="text-center mb-6">
                    <img src="{{ asset('assets/logo/WikVentoryPrimaryLS.png') }}" alt="WikVentory" width="250"
                        class="mb-5">
                    <p class="text-muted small">Please log in to start using the available features.</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Enter email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Enter password">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit"
                            class="btn bg-dark-blue text-white py-2 fw-bold text-uppercase mb-4">Login</button>
                            <a href="/" class="text-center mb-0">back to home.</a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
</body>

</html>
