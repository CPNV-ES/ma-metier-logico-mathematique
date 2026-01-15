<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AccueilController;

Route::get('/', function () {
    return view('welcome');
});

//Pour la page d'accueil
//Route::get('/accueil', [AccueilController::class, 'accueil'])->name('accueil');

Route::prefix('/homepage')->name('homepage.')->controller(AccueilController::class)->group(function(){
    //Page d'accueil
    Route::get('/','homepage')->name('homepage');
    //Page de login
    Route::get('/login','login')->name('login');
    //Page création de compte
    Route::get('/new','newAccount')->name('newAccount');
    //Page liste d'élève de la classe, a modifier !
    Route::get('/classes','classes')->name('classes');
});