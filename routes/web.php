<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exemple', [IndexController::class, 'exempleView']);

Route::get('/pokemonrlm/wiki/pokedex', [IndexController::class, 'wikiPokemonPokedexView']);

Route::get('/pokemonrlm/wiki/pokemon/{id_pokemon}/{id_form}', [IndexController::class, 'wikiPokemonPokemonView']);
