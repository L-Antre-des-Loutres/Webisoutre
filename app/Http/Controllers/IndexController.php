<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function exempleView(): Factory|View
    {
        // Retourner la vue "exemple"
        return view('exemple');
    }
}
