<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home - Antre des loutres')

@section('content')
    @include('components.banniere')
    <h1>Bienvenue sur la page d'accueil</h1>
    <p>Ceci est le contenu de la page d'accueil.</p>


    <p>Tableau des serveurs</p>
    <!-- resources/components/liste_serveur.blade.php -->
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
            'start_script' => false,
            'administrateur' => false,
            'actif' => true,
            'nb_joueurs' => true,
            'players' => false,
            'online' => true,
        ];
    @endphp
    <br>
    @include('components.liste_serveur')

    @php
        $serveur = 'pixeloween';

        $listeConfig = [
            'pseudo' => true,
            'uuid' => true,
            'tempsJeux' => true,
            'nbMorts' => true,
            'nbSauts' => true,
            'nbKill' => true,
            'nbDeathByPlayer' => true,
            'nbKillMob' => true,
            'nbBlocMine' => true,
            'nbKillByMob' => true,
            'nbUseItem' => true,
            'nbCraft' => true,
            'nbItemDrop' => true,
            'distTotale' => true,
            'nbItemBreak' => true,
        ];
    @endphp

    @include('components.classement')

@endsection
