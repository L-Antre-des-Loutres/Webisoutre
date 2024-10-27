<div id="composant:classement">

    <?php

    use App\Models\Stats;

    // Initialise un tableau pour les erreurs
    $erreurs = [];

    // Vérification de l'existence de la variable $serveur
    if (!isset($serveur)) {
        // Si $serveur n'est pas défini, on essaye de le récupérer à partir de la requête
        if (function_exists('request')) {
            // Si la fonction request() est disponible, on l'utilise
            $serveur = request()->query('serveur');
        } else {
            // Sinon, on le définit manuellement à null ou une autre valeur par défaut
            $serveur = null;
        }
    }

    if (!isset($jeu)) {
        $jeu = null;
    }

    // Si le paramètre "serveur" est vide après récupération
    if ($serveur && $serveur != 'global' && $serveur != 'jeu') {
        // Récupérer les serveurs en fonction du jeu spécifié
        $data = Stats::getStatsByServeur($serveur);
    } elseif ($serveur == 'global') {
        $data = Stats::getAllStatsOfPlayers();
    } elseif ($serveur == 'jeu') {
        $data = Stats::getAllStatsOfPlayersByGame($jeu);
    } else {
        // Récupérer les stats de l'ensemble des serveurs
        $data = Stats::getAllStats();
    }

    if (empty($erreurs)) {
        // Exemple de configuration si non défini
        $listeConfig = $listeConfig ?? [
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
    }

    // Vérifie si la variable $listeConfig n'est pas définie
    if (!isset($listeConfig)) {
        $listeConfig = [];
    }

    /* Exemple de variable de configuration pour l'affichage dans le tableau
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
        */

    /* Tableau de configuration des données du THEAD */

    // Tableau associatif pour mapper les colonnes aux étiquettes
    $labels = [
        'tempsJeux' => 'Temps de jeu',
        'nbMorts' => 'Morts',
        'nbSauts' => 'Sauts',
        'nbKill' => 'Kills',
        'nbDeathByPlayer' => 'Morts par joueurs',
        'nbKillMob' => 'Mobs tués',
        'nbBlocMine' => 'Blocs cassés',
        'nbKillByMob' => 'Morts par un monstre',
        'nbUseItem' => 'Items utilisés',
        'nbCraft' => 'Items craftés',
        'nbItemDrop' => 'Items jetés',
        'distTotale' => 'Distance parcourue (blocs)',
        'nbItemBreak' => 'Items cassés',
    ];

    ?>
    <div class="overflow-x-auto mx-auto">

        <!-- Affichage des erreurs -->
        @if (!empty($erreurs))
            <!-- Si des erreurs sont présentes, on les affiche -->
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Erreur!</strong>
                <ul>
                    @foreach ($erreurs as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <!-- Sinon, on affiche le tableau -->
            <table class="min-w-full bg-white border border-gray-300 " id="statsTable">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 text-center uppercase text-sm leading-normal">
                        @foreach ($listeConfig as $colonne => $afficher)
                            @if ($afficher)
                                <th class="py-3 px-6 text-center min-w-[15rem] cursor-pointer"
                                    data-key="{{ $colonne }}" onclick="sortTable(this)">
                                    {{ $labels[$colonne] ?? ucfirst(str_replace('_', ' ', $colonne)) }}
                                    <span class="ml-1 text-xs text-gray-500">⇅</span> <!-- Icône de tri -->
                                </th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($data as $ligne)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            @foreach ($listeConfig as $colonne => $afficher)
                                @if ($afficher)
                                    <td class="py-3 px-6 min-w-[15rem] text-center align-middle">
                                        {{-- Vérifie si la valeur est un tableau, sinon affiche-la directement --}}
                                        @if (is_array($ligne[$colonne] ?? ''))
                                            {{-- Si c'est un tableau, affiche-le sous forme de JSON ou utilise implode si c'est un tableau simple --}}
                                            {{ json_encode($ligne[$colonne]) }}
                                        @elseif ($colonne === 'pseudo')
                                            {{ $ligne[$colonne] ?? '' }}  <img src="https://mc-heads.net/avatar/{{ $ligne[$colonne] ?? '' }}/30" alt="Tête de joueur" style="float: left; margin-left: 10px;">
                                        @elseif ($colonne === 'tempsJeux' && !empty($ligne[$colonne]))
                                            {{-- Si c'est la colonne tempsJeux, ajoute un H --}}
                                            {{ $ligne[$colonne] }} h
                                        @else
                                            {{ $ligne[$colonne] ?? '' }}
                                        @endif
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        let sortDirection = {}; // Objet pour suivre la direction de tri pour chaque colonne
        let lastSortedColumn = null; // Variable pour garder la trace de la dernière colonne triée

        function extractNumberWithSuffix(value) {
            const regex = /(\d+)(?:\s*[hHkK])?/; // L'expression régulière
            const match = value.match(regex); // Cherche une correspondance
            return match ? parseFloat(match[1]) : null; // Retourne le nombre trouvé ou null
        }

        function sortTable(th) {
            const table = document.getElementById("statsTable");
            let rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            switching = true;

            const columnIndex = Array.prototype.indexOf.call(th.parentNode.children, th);
            const key = th.getAttribute('data-key'); // Récupère la clé de tri

            // Déterminer la direction de tri
            if (lastSortedColumn !== columnIndex) {
                dir = "asc";
                sortDirection[columnIndex] = "asc"; // Mettre à jour la direction pour la nouvelle colonne
            } else {
                dir = sortDirection[columnIndex] === "desc" ? "asc" : "desc";
                sortDirection[columnIndex] = dir; // Mettre à jour la direction
            }

            lastSortedColumn = columnIndex; // Mettre à jour la dernière colonne triée

            // Boucle jusqu'à ce que le tri soit terminé
            while (switching) {
                switching = false;
                rows = table.rows;

                // Parcourir toutes les lignes du tableau (sauf l'en-tête)
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;

                    // Obtenez les deux éléments à comparer
                    x = rows[i].getElementsByTagName("TD")[columnIndex];
                    y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

                    // Extraire les valeurs numériques avec suffixe
                    const xValue = extractNumberWithSuffix(x.innerHTML);
                    const yValue = extractNumberWithSuffix(y.innerHTML);

                    // Vérifiez si le tri doit être effectué
                    if (dir === "asc") {
                        if (xValue === null && yValue === null) {
                            continue;
                        } else if (xValue === null) {
                            shouldSwitch = false;
                        } else if (yValue === null) {
                            shouldSwitch = true;
                        } else if (xValue < yValue) {
                            shouldSwitch = true;
                        }
                    } else if (dir === "desc") {
                        if (xValue === null && yValue === null) {
                            continue;
                        } else if (xValue === null) {
                            shouldSwitch = true;
                        } else if (yValue === null) {
                            shouldSwitch = false;
                        } else if (xValue > yValue) {
                            shouldSwitch = true;
                        }
                    }

                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        switchcount++;
                    }
                }
                if (switchcount === 0) {
                    break;
                }
            }
        }
    </script>

</div>
