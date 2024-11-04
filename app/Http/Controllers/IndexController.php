<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    // Controller example
    public function exempleView(): Factory|View
    {
        // Retourner la vue "exemple"
        return view('exemple');
    }

    // Fonction pour afficher la page de la liste des pokémons du Pokédex national
    public function wikiPokemonPokedexView() {
        $pokemons = Http::get('https://api-rlm.antredesloutres.fr/pokemon/national-dex')->json();

        return view('rlm-wiki-pokedex', compact('pokemons'));
    }

    public function wikiPokemonPokemonView($id_pokemon, $id_form) {
        $response = Http::get("https://api-rlm.antredesloutres.fr/pokemon/{$id_pokemon}/{$id_form}");

        if ($response->successful()) {
            $pokemonData = $response->json('data');
        } else {
            abort(404, 'Pokémon not found');
        }

        return view('rlm-wiki-pokemon', compact('pokemonData'));
    }
}
