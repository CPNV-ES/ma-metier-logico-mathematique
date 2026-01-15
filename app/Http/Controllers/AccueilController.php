<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AccueilController extends Controller
{
    //appellera la page d'accueil
    public function accueil (): View {
        return view('accueil');
    }
}
