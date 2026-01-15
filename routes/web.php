<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AccueilController;

Route::get('/', function () {
    return view('welcome');
});

//Pour la page d'accueil
Route::get('/accueil', [AccueilController::class, 'accueil']);