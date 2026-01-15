<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AccueilController;

Route::get('/', function () {
    return view('welcome');
});

//Pour la page d'accueil
//Route::get('/accueil', [AccueilController::class, 'accueil'])->name('accueil');

Route::prefix('/accueil')->name('accueil.')->controller(AccueilController::class)->group(function(){
    //Page d'accueil
    Route::get('/','accueil')->name('PageAccueil');
    //Page de login
    Route::get('/login','login')->name('login');
    //Page création de compte
    Route::get('/new','newAccount')->name('newAccount');
    //Page liste d'élève de la classe, a modifier !
    Route::get('/classe','classe')->name('classe');
});