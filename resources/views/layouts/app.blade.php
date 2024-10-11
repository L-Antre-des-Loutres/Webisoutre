<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'Antre des loutres')</title>
</head>

<body>

    <!-- Navigation / Header -->
    @include('components.header.header')

    <!-- Main content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('components.footer.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
