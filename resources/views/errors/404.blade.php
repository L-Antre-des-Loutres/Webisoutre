<!-- resources/views/errors/404.blade.php -->
@extends('layouts.app')

@section('title', 'Erreur 404 - Antre des Loutres')

@section('content')
<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800">404</h1>
        <p class="mt-4 text-2xl text-gray-600">Oups ! Page non trouvée.</p>
        <p class="mt-2 text-gray-500">Il semble que la page que vous cherchez n'existe pas ou a été déplacée.</p>

        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Retour à l'accueil
        </a>
    </div>
</div>
@endsection
