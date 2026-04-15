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

            
            </div>
        </div>

    </div>
</body>

</html>
