<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- Link -->
    <link rel="icon" href="{{ asset('img/logo/logo.png') }}">

    <title>@yield('title', 'Antre des loutres')</title>
</head>

<body>

    <!-- Navigation / Header -->
    @include('components.header.header')

    <!-- Espace réservé pour éviter que le contenu soit recouvert -->
    <div id="header-spacer" class="min-h-[6rem] md:min-h-[7.5rem] lg:min-h-[7.5rem] xl:min-h-[7.5rem]"></div>

    <!-- Main content -->
    <div class="w-full min-h-[40rem]">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('components.footer.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
