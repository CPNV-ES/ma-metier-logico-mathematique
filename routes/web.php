<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomepageController;

Route::get('/', function () {
    return view('welcome');
});

//Pour la page d'accueil
//Route::get('/accueil', [AccueilController::class, 'accueil'])->name('accueil');

Route::prefix('/homepage')->name('homepage.')->controller(HomepageController::class)->group(function(){
    //Page d'accueil
    Route::get('/','homepage')->name('homepage');
    //pour le formulaire, travail en cours
    Route::post('/','jsp');
    //Page de login
    Route::get('/login','login')->name('login');
    //Page création de compte
    Route::get('/new','newAccount')->name('newAccount');
    //Page liste d'élève de la classe, a modifier !
    //Route::get('/classes','classes')->name('classes');
    Route::get('/classes/{name}','classes')->name('classes');
});
