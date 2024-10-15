<?php

/* Exemple des donées renvoyés par le serveur
 {
    "id_serv": "0",
    "jeu": "Minecraft",
    "nom_serv": "La Vanilla",
    "modpack": "Minecraft Vanilla",
    "modpack_url": "https://www.minecraft.net/fr-fr",
    "embedColor": "#9adfba",
    "nom_monde": "world",
    "version_serv": "1.21",
    "path_serv": "/home/serveurs/minecraft/serveurs-globaux/vanilla/",
    "start_script": "start.sh",
    "administrateur": "Azertor",
    "actif": true,
    "nb_joueurs": 0,
    "players": [],
    "online": false
  },

*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Serveur extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_serv',
        'jeu',
        'nom_serv',
        'modpack',
        'modpack_url',
        'embedColor',
        'nom_monde',
        'version_serv',
        'path_serv',
        'start_script',
        'administrateur',
        'actif',
        'nb_joueurs',
        'players',
        'online'
    ];

    public static function getServeurs()
    {
        // Utilisation de la classe Http de Laravel pour récupérer les données de l'API
        $response = Http::get('https://api.antredesloutres.fr/serveurs/actifs');

        // Vérification si la requête a réussi et récupération des données
        if ($response->successful()) {
            return $response->json(); // Retourne les données JSON sous forme de tableau
        }

        return []; // Retourne un tableau vide en cas d'échec
    }

    public static function getJeux()
    {
        // Utilisation de la classe Http de Laravel pour récupérer les données de l'API
        $response = Http::get('https://api.antredesloutres.fr/serveurs/actifs');

        if (!$response->successful()) {
            return []; // Retourne un tableau vide en cas d'échec
        }

        // Filtrage des jeux uniques
        $jeux = $response->json();
        $jeux = array_column($jeux, 'jeu');
        $jeux = array_unique($jeux);

        return $jeux;
    }

    public static function getServeurByJeu($jeu)
    {
        // Utilisation de la classe Http de Laravel pour récupérer les données de l'API
        $response = Http::get('https://api.antredesloutres.fr/serveurs/jeu/' . $jeu);

        // Vérification si la requête a réussi et récupération des données
        if ($response->successful()) {
            return $response->json(); // Retourne les données JSON sous forme de tableau
        } else {
            return []; // Retourne un tableau vide en cas d'échec
        }
    }
}
