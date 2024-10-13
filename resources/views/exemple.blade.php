<!-- Utilisation du layout app.blade.php -->
@extends('layouts.app')

<!-- Gestion du titre de la page -->
@section('title', 'ADL - Home')

<!-- Emplacement du contenu de la page -->
@section('content')

<!-- Utilisation du composant liste_serveur.blade.php -->
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
    @include('components.liste_serveur')

<!-- Autres exemples -->

@endsection
