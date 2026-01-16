<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    //appelle la page d'accueil
    public function homepage (): View {
        return view('homepage');
    }

    //appelle la page de login
    public function login (): View {
        return view('login');
    }

    //appelle la page de création de compte
    public function newAccount (): View {
        return view('newAccount');
    }

    //appelera la page avec tous les élèves de la classe
    public function classes (/*string $nomclasse*/){
        return "Listes des élèves";
        //Avec la BD
        /* */
    }

    //jsp encore mais c'est pour les classes
    public function jsp(Request $request){
        //debug pour afficher ce que la personne à entrer
        dd($request->all());
        //Avec la BD
        /* $tableclasse = \App\Models\tableclasse::findOrFail($code);
        return redirect()->route('homepage.classes', 'nomclasse'=>$tableclasse->nomclasse); */
    }
}
