<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'ADL - Home')

@section('content')
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Ceci est le contenu de la page d'accueil.</p>


    <p>Tableau des serveurs</p>
    @php
        $jeu = 'Minecraft';
        $listeConfig = [
            'id_serv' => false,
            'jeu' => true,
            'nom_serv' => true,
            'modpack' => true,
            'modpack_url' => true,
            'embedColor' => false,
            'nom_monde' => true,
            'version_serv' => true,
            'path_serv' => true,
            'start_script' => true,
            'administrateur' => false,
            'actif' => true,
            'nb_joueurs' => true,
            'players' => true,
            'online' => true,
        ];
    @endphp
    @include('components.liste_serveur')

@endsection
