<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //appellera la page d'accueil
    public function accueil (){
        return "Page d'accueil";
    }
}
