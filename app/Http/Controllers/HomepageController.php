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
        $SchoolClass = \App\Models\SchoolClass::query()
            ->where('class_code',$class_code)
            ->first();
        return redirect()->route('homepage.classes', ['name'=>$SchoolClass->name]);
    }
}
