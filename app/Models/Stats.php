<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Stats extends Model
{
    use HasFactory;

    protected $fillable = [
        "pseudo",
        "uuid",
        "nom_serv",
        "id_serv",
        "tempsJeux",
        "nbMorts",
        "nbSauts",
        "nbKill",
        "nbDeathByPlayer",
        "nbKillMob",
        "nbBlocMine",
        "nbKillByMob",
        "nbUseItem",
        "nbCraft",
        "nbItemDrop",
        "distTotale",
        "nbItemBreak",
    ];

    public static function getAllStats()
    {
        // Utilisation de la classe Http de Laravel pour récupérer les données de l'API
        $response = Http::get('https://api.antredesloutres.fr/serveurs/stats/');

        // Vérification si la requête a réussi et récupération des données
        if ($response->successful()) {
            // Récupérer les données JSON et trier par tempsJeux
            return collect($response->json())->sortByDesc('tempsJeux')->values()->toArray();
        }

        return []; // Retourne un tableau vide en cas d'échec
    }

    public static function getAllStatsOfPlayers()
    {
        $response = Http::get('https://api.antredesloutres.fr/serveurs/stats/');

        if ($response->successful()) {
            // Récupérer les données JSON
            $data = collect($response->json());

            // Regrouper les données par 'uuid' et additionner les statistiques
            $groupedStats = $data->groupBy('uuid')->map(function ($group) {
                return [
                    // Fixer nom_serv à "global" et id_serv à 0
                    'pseudo' => $group->first()['pseudo'],
                    'nom_serv' => 'global',
                    'id_serv' => 0,
                    'tempsJeux' => $group->sum('tempsJeux'),
                    'nbMorts' => $group->sum('nbMorts'),
                    'nbSauts' => $group->sum('nbSauts'),
                    'nbKill' => $group->sum('nbKill'),
                    'nbDeathByPlayer' => $group->sum('nbDeathByPlayer'),
                    'nbKillMob' => $group->sum('nbKillMob'),
                    'nbBlocMine' => $group->sum('nbBlocMine'),
                    'nbKillByMob' => $group->sum('nbKillByMob'),
                    'nbUseItem' => $group->sum('nbUseItem'),
                    'nbCraft' => $group->sum('nbCraft'),
                    'nbItemDrop' => $group->sum('nbItemDrop'),
                    'distTotale' => $group->sum('distTotale'),
                    'nbItemBreak' => $group->sum('nbItemBreak'),
                ];
            });

            // Convertir le résultat en tableau et trier par tempsJeux
            return collect($groupedStats)->sortByDesc('tempsJeux')->values()->toArray();
        }

        return []; // Retourne un tableau vide en cas d'échec
    }

    public static function getAllStatsOfPlayersByGame($nom_du_jeu)
    {
        $response = Http::get('https://api.antredesloutres.fr/serveurs/stats/');

        if ($response->successful()) {
            // Récupérer les données JSON
            $data = collect($response->json());

            // Filtrer les données pour ne garder que celles du jeu spécifique
            $filteredData = $data->filter(function ($item) use ($nom_du_jeu) {
                return isset($item['jeu']) && strtolower($item['jeu']) === strtolower($nom_du_jeu);
            });

            // Vérifier si des données ont été trouvées
            if ($filteredData->isEmpty()) {
                return ['message' => 'Aucune donnée trouvée pour ce jeu. Merci de vérifier vos variables.'];
            }

            // Regrouper les données par 'uuid' et additionner les statistiques
            $groupedStats = $filteredData->groupBy('uuid')->map(function ($group) {
                return [
                    'pseudo' => $group->first()['pseudo'] ?? 'Inconnu',
                    'nom_serv' => $group->first()['nom_serv'] ?? 'Inconnu',
                    'jeu' => $group->first()['jeu'] ?? 'Inconnu',
                    'id_serv' => $group->first()['id_serv'] ?? 0,
                    'tempsJeux' => $group->sum('tempsJeux'),
                    'nbMorts' => $group->sum('nbMorts'),
                    'nbSauts' => $group->sum('nbSauts'),
                    'nbKill' => $group->sum('nbKill'),
                    'nbDeathByPlayer' => $group->sum('nbDeathByPlayer'),
                    'nbKillMob' => $group->sum('nbKillMob'),
                    'nbBlocMine' => $group->sum('nbBlocMine'),
                    'nbKillByMob' => $group->sum('nbKillByMob'),
                    'nbUseItem' => $group->sum('nbUseItem'),
                    'nbCraft' => $group->sum('nbCraft'),
                    'nbItemDrop' => $group->sum('nbItemDrop'),
                    'distTotale' => $group->sum('distTotale'),
                    'nbItemBreak' => $group->sum('nbItemBreak'),
                ];
            });

            // Convertir le résultat en tableau et trier par tempsJeux
            return collect($groupedStats)->sortByDesc('tempsJeux')->values()->toArray();
        }

        return ['message' => 'Erreur lors de la récupération des données.']; // Message d'erreur en cas d'échec de la requête
    }

    public static function getStatsByServeur($serveur)
    {
        // Utilisation de la classe Http de Laravel pour récupérer les données de l'API
        $response = Http::get('https://api.antredesloutres.fr/serveurs/stats/' . $serveur);

        // Vérification si la requête a réussi et récupération des données
        if ($response->successful()) {
            // Récupérer les données JSON et trier par tempsJeux
            return collect($response->json())->sortByDesc('tempsJeux')->values()->toArray();
        }

        return []; // Retourne un tableau vide en cas d'échec
    }

}
