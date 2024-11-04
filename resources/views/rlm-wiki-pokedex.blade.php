<!-- Utilisation du layout app.blade.php -->
@extends('layouts.app')

<!-- Gestion du titre de la page -->
@section('title', 'Wiki Pokémon RLM - Antre des loutres')

<!-- Emplacement du contenu de la page -->
@section('content')

<!-- Liste des Pokémons récupéré depuis la requete api https://api-rlm.antredesloutres.fr/pokemon/ -->
<!-- données :
    {
"data": [
{
    "id": 106,
    "dexId": 1,
    "nameEN": "bulbasaur",
    "nameFR": "Bulbizarre"
},
{
    "id": 429,
    "dexId": 2,
    "nameEN": "ivysaur",
    "nameFR": "Herbizarre"
},
etc...
-->

<div class="container"
    <h1 class="text-center">Wiki Pokémon RLM</h1>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">N° de Pokédex | </th>
                        <th scope="col">Nom du Pokémon | </th>
                        <th scope="col">N° de Forme</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through $pokemons["data"] and display each Pokémon -->
                    @foreach($pokemons["data"] as $pokemon)
                        <tr>
                            <td>{{ $pokemon["dexId"] }}</td>
                            <td>
                                <a style="color: #0000EE" href="https://corentin.antredesloutres.site/pokemonrlm/wiki/pokemon/{{ $pokemon["dexId"] }}/{{ $pokemon["form"] }}">
                                    <!-- Afficher "mega" avant le nom du Pokémon si $pokemon["form"] >= 30 -->
                                    @if($pokemon["form"] >= 30)
                                        Mega-{{ $pokemon["nameFR"] }}
                                    @else
                                        {{ $pokemon["nameFR"] }}
                                    @endif
                                </a>
                            <td>
                            <td>{{ $pokemon["form"] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>

    

@endsection
