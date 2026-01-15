<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AccueilController extends Controller
{
    //appelle la page d'accueil
    public function accueil (): View {
        return view('accueil');
    }

    //appelera la page de login
    public function login (){
        return "login";
    }

    //appelera la page de création de compte
    public function newAccount (){
        return "Nouveau compte";
    }

    //appelera la page avec tous les élèves de la classe
    public function classe (){
        return "Listes des élèves";
    }
}
