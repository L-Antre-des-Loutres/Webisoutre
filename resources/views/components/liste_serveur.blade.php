<div id="composant:liste_serveur">

    <?php

    use App\Models\Serveur;

    // Initialise un tableau pour les erreurs
    $erreurs = [];

    // Vérification de l'existence de la variable $jeu
    if (!isset($jeu)) {
        // Si $jeu n'est pas défini, on essaye de le récupérer à partir de la requête
        if (function_exists('request')) {
            // Si la fonction request() est disponible, on l'utilise
            $jeu = request()->query('jeu');
        } else {
            // Sinon, on le définit manuellement à null ou une autre valeur par défaut
            $jeu = null;
        }
    }

    // Si le paramètre "jeu" est vide après récupération
    if (!$jeu) {
        // Ajoute un message d'erreur dans le tableau des erreurs
        $erreurs[] = "La variable 'jeu' est requise pour récupérer les serveurs.";
    }

    // Si aucune erreur, on récupère les données des serveurs
    if (empty($erreurs)) {
        // Récupérer les serveurs en fonction du jeu spécifié
        $data = Serveur::getServeurByJeu($jeu); // On passe $jeu à la méthode

        // Exemple de configuration si non défini
        $listeConfig = $listeConfig ?? [
            'id_serv' => true,
            'jeu' => true,
            'nom_serv' => true,
            'modpack' => true,
            'modpack_url' => true,
            'embedColor' => true,
            'nom_monde' => true,
            'version_serv' => true,
            'path_serv' => true,
            'start_script' => true,
            'administrateur' => true,
            'actif' => true,
            'nb_joueurs' => true,
            'players' => true,
            'online' => true,
        ];
    }

    // Vérifie si la variable $listeConfig n'est pas définie
    if (!isset($listeConfig)) {
        $listeConfig = [];
    }
    /* Exemple de variable de configuration pour l'affichage dans le tableau */
    //$listeConfig = ["id_serv" => true, "jeu" => true, "nom_serv" => true, "modpack" => true, "modpack_url" => true, "embedColor" => true, "nom_monde" => true, "version_serv" => true, "path_serv" => true, "start_script" => true, "administrateur" => true, "actif" => true, "nb_joueurs" => true, "players" => true, "online" => true];
    ?>

    <div class="overflow-x-auto">

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
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        @foreach ($listeConfig as $colonne => $afficher)
                            @if ($afficher)
                                <th class="py-3 px-6 text-left">{{ ucfirst(str_replace('_', ' ', $colonne)) }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($data as $ligne)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            @foreach ($listeConfig as $colonne => $afficher)
                                @if ($afficher)
                                    <td class="py-3 px-6 text-left">
                                        {{-- Vérifie si la valeur est un tableau, sinon affiche-la directement --}}
                                        @if (is_array($ligne[$colonne] ?? ''))
                                            {{-- Si c'est un tableau, affiche-le sous forme de JSON ou utilise implode si c'est un tableau simple --}}
                                            {{ json_encode($ligne[$colonne]) }}
                                        @elseif ($colonne === 'modpack_url' && !empty($ligne[$colonne]))
                                            {{-- Si c'est la colonne modpack_url, affiche un lien --}}
                                            <a href="{{ $ligne[$colonne] }}" target="_blank"
                                                class="text-blue-600 hover:underline">
                                                {{ $ligne[$colonne] }}
                                            </a>
                                        @elseif ($colonne === 'online')
                                            {{-- Vérifie si la clé 'online' existe et affiche 'Ouvert' ou 'Fermé' --}}
                                            {{ isset($ligne[$colonne]) && $ligne[$colonne] == 1 ? 'Ouvert' : 'Fermé' }}
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
</div>
