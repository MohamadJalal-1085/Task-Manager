{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #f8f9fa;
            /* Add padding to the top of the body to prevent content from being hidden by the fixed navbar */
            padding-top: 70px; 
        }
        .container { max-width: 960px; }
        .card { margin-bottom: 1.5rem; }
    </style>
</head>
<body>

    {{-- This is where you call your header component --}}
    <x-header />

    <main class="container mt-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>