<!-- Utilisation du layout app.blade.php -->
@extends('layouts.app')

<!-- Gestion du titre de la page -->
@section('title', 'ADL - Home')

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
    <div style="display: flex; align-items: flex-start;">
        <!-- Bloc de code -->
        <pre id="code-block" style="margin-right: 10px;">
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
        </pre>

        <!-- Bouton Copier -->
        <button onclick="copyToClipboard()" class="copy-button">Copier</button>
    </div>

    <div class="my-4 border-t border-gray-300"></div>


    <!-- Fonctionnalité spécifique à la page d'exemple -->
    <script>
        function copyToClipboard() {
            // Sélectionner le contenu du bloc <code>
            const codeBlock = document.getElementById('code-block').innerText;

            // Créer un élément temporaire pour sélectionner et copier le texte
            const tempElement = document.createElement('textarea');
            tempElement.value = codeBlock;
            document.body.appendChild(tempElement);
            tempElement.select();
            document.execCommand('copy');
            document.body.removeChild(tempElement);

            // Afficher un message ou un feedback visuel
            alert('Code copié dans le presse-papiers!');
        }
    </script>

    <style>
        /* Style du bouton avec un contour */
        .copy-button {
            padding: 8px 16px;
            background-color: transparent;
            /* Transparent pour mettre en avant le contour */
            color: #4CAF50;
            border: 2px solid #4CAF50;
            /* Contour vert */
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        /* Effet au survol */
        .copy-button:hover {
            background-color: #4CAF50;
            color: white;
            /* Inverser les couleurs lors du survol */
        }

        /* Style du bloc de code */
        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            overflow-x: auto;
            /* Pour faire défiler horizontalement si le code est long */
        }
    </style>


    <!-- Autres exemples -->

@endsection
