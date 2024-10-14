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
