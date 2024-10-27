<!-- Utilisation du layout app.blade.php -->
@extends('layouts.app')

<!-- Gestion du titre de la page -->
@section('title', "{$jeu} - Antre des loutres")

<!-- Emplacement du contenu de la page -->
@section('content')

@php
$image = 'La Vanilla';
@endphp
@include('components.banniere')

@php
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


@endsection
