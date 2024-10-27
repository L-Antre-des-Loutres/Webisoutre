<!-- Utilisation du layout app.blade.php -->
@extends('layouts.app')

<!-- Gestion du titre de la page -->
@section('title', "{$jeu} - Antre des loutres")

<!-- Emplacement du contenu de la page -->
@section('content')

@php
$titre = 'Minecraft';
$description = 'Antre des loutres';
$image = 'La Vanilla';
@endphp

@include('components.banniere')

@php
$listeConfig = [
    'id_serv' => false,
    'jeu' => false,
    'nom_serv' => true,
    'modpack' => true,
    'modpack_url' => true,
    'embedColor' => false,
    'nom_monde' => false,
    'version_serv' => true,
    'path_serv' => false,
    'start_script' => false,
    'administrateur' => false,
    'actif' => false,
    'nb_joueurs' => true,
    'players' => false,
    'online' => true,
];
@endphp
@include('components.liste_serveur')

<h1>Statistique des joueurs Minecraft</h1>

@php
$serveur = 'jeu';

$listeConfig = [
    'pseudo' => true,
    'uuid' => false,
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
