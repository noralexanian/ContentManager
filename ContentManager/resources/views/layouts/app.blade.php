<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Manager</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- jQuery and Bootstrap Bundle (Popper, etc..) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <!-- JS -->
    @vite('resources/js/article.js')
    <!-- Styles -->
    @vite(['resources/css/app.css'])
</body>
</html>

