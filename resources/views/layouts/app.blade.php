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

    <!-- Espace réservé pour éviter que le contenu soit recouvert -->
    <div id="header-spacer" class="min-h-[12vh] md:min-h-[22vh] lg:min-h-[22vh] xl:min-h-[15vh]"></div>

    <!-- Main content -->
    <div class="container min-h-[100vh]">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('components.footer.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
