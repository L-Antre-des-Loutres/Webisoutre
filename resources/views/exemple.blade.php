<!-- Utilisation du layout app.blade.php -->
@extends('layouts.app')

<!-- Gestion du titre de la page -->
@section('title', 'Exemple - Antre des loutres')

<!-- Emplacement du contenu de la page -->
@section('content')

    <!-- Utilisation du composant liste_serveur.blade.php -->
    <!-- resources/components/liste_serveur.blade.php -->
    <h1>Tableau liste des serveurs</h1>
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

    <br>

    Code d'utilisation
    <div>
        <!-- Bloc de code -->
        <code>
            @verbatim
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
            @endverbatim
        </code>
    </div>

    <div class="my-4 border-t border-gray-300"></div>

    <!-- Classement des joueurs -->
    <h1>Tableau classement des joueurs</h1>
    @php
        $serveur = 'global';

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

    Code d'utilisation
    <div>
        <!-- Bloc de code -->
        <code>
            @verbatim
                @php
                    $serveur = 'global';

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
            @endverbatim
        </code>
    </div>


@endsection
