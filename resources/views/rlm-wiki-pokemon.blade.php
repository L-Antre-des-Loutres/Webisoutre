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
    <h1 class="text-center">Wiki Pokémon RLM</h1><br>
    <a style="color: #0000EE" href="https://corentin.antredesloutres.site/pokemonrlm/wiki/pokedex" class="btn btn-primary">Voir tout le Pokédex</a>
    <div class="container">
    <h2>{{ $pokemonData['nameFR'] }} ({{ ucfirst($pokemonData['nameEN']) }})</h2>
    <p>{{ $pokemonData['descFR'] }}</p>
    <p><em>{{ $pokemonData['descEN'] }}</em></p>

    <table class="table table-bordered">
        <tr><th>Dex ID</th><td>{{ $pokemonData['dexId'] }}</td></tr>
        <tr><th>Form</th><td>{{ $pokemonData['form'] }}</td></tr>
        <tr><th>Height</th><td>{{ $pokemonData['height'] }} m</td></tr>
        <tr><th>Weight</th><td>{{ $pokemonData['weight'] }} kg</td></tr>
        <tr><th>Type 1</th><td>{{ ucfirst($pokemonData['type1']) }}</td></tr>
        <tr><th>Type 2</th><td>{{ ucfirst($pokemonData['type2']) ?? 'None' }}</td></tr>
        <tr><th>Ability One</th><td>{{ ucfirst($pokemonData['abilityOne']) }}</td></tr>
        <tr><th>Ability Two</th><td>{{ ucfirst($pokemonData['abilityTwo']) }}</td></tr>
        <tr><th>Hidden Ability</th><td>{{ ucfirst($pokemonData['abilityHidden']) }}</td></tr>
        <tr><th>Base HP</th><td>{{ $pokemonData['baseHp'] }}</td></tr>
        <tr><th>Base Attack</th><td>{{ $pokemonData['baseAtk'] }}</td></tr>
        <tr><th>Base Defense</th><td>{{ $pokemonData['baseDfe'] }}</td></tr>
        <tr><th>Base Speed</th><td>{{ $pokemonData['baseSpd'] }}</td></tr>
        <tr><th>Base Sp. Attack</th><td>{{ $pokemonData['baseAts'] }}</td></tr>
        <tr><th>Base Sp. Defense</th><td>{{ $pokemonData['baseDfs'] }}</td></tr>
        <tr><th>EVs Given</th><td>{{ "{$pokemonData['evGivenHp']} HP, {$pokemonData['evGivenAtk']} Atk, {$pokemonData['evGivenDfe']} Dfe, {$pokemonData['evGivenSpd']} Spd, {$pokemonData['evGivenAts']} Ats, {$pokemonData['evGivenDfs']} Dfs" }}</td></tr>
        <tr><th>Experience Type</th><td>{{ $pokemonData['experienceType'] }}</td></tr>
        <tr><th>Base Experience</th><td>{{ $pokemonData['baseExperience'] }}</td></tr>
        <tr><th>Loyalty</th><td>{{ $pokemonData['baseLoyalty'] }}</td></tr>
        <tr><th>Catch Rate</th><td>{{ $pokemonData['catchRate'] }}</td></tr>
        <tr><th>Female Rate</th><td>{{ $pokemonData['femaleRate'] }}%</td></tr>
        <tr><th>Hatch Steps</th><td>{{ $pokemonData['hatchSteps'] }}</td></tr>
        <tr><th>Baby Symbol</th><td>{{ ucfirst($pokemonData['babyDbSymbol']) }}</td></tr>
        <tr><th>Baby Form</th><td>{{ $pokemonData['babyForm'] }}</td></tr>
    </table>
</div>
</div>
<br>

    

@endsection
