<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MinecraftController extends Controller
{
    // Définir la variable comme une propriété de la classe
    protected $jeu;

    public function __construct()
    {
        $this->jeu = 'minecraft';
    }

    public function index()
    {
        return view('minecraft', ['jeu' => $this->jeu]);
    }

}
