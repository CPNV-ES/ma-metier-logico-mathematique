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
    public function classes (string $name){
        return "Listes des élèves";
        //Avec la BD
        /* */
    }

    //redirige vers une classe en fonction du code
    public function resolveClassByCode(Request $request){
        $class_code = $request->class_code;
        //Met class_code en requis --> il ne peut pas être null
        $request->validate([
            'class_code' => 'required'
        ], [
        //Texte de l'erreur qui s'affichera
            'class_code.required' => 'Veuillez entrer un code de classe.'
        ]);
        //Va chercher la classe grâce au code
        $SchoolClass = \App\Models\SchoolClass::query()->where('class_code',$class_code)->first();
        //La recherche a donné une erreur --> le code de classe n'existe pas dans la BD
        if (!$SchoolClass) {
            return back()->withErrors([
            //Texte de l'erreur qui s'affichera
            'class_code' => 'Ce code de classe est invalide.'
            ]);
            }
        //Tout s'est bien passé --> dirigé vers la bonne classe
        return redirect()->route('homepage.classes', ['name'=>$SchoolClass->name]);
    }
}
