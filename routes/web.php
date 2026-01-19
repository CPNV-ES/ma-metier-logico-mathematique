<?php

use App\Http\Controllers\Auth\TeacherRegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TeacherAuthenticatedSessionController;
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
    Route::post('/','resolveClassByCode');

    //Page liste d'élève de la classe, a modifier !
    //Route::get('/classes','classes')->name('classes');
    Route::get('/classes/{name}','classes')->name('classes');
});



Route::middleware('guest:teacher')->group(function () {
    Route::get('/teacher/login', [TeacherAuthenticatedSessionController::class, 'create'])
        ->name('teacher.login');

    Route::post('/teacher/login', [TeacherAuthenticatedSessionController::class, 'store'])
        ->name('teacher.login.store');
});

Route::middleware('auth:teacher')->group(function () {
    Route::post('/teacher/logout', [TeacherAuthenticatedSessionController::class, 'destroy'])
        ->name('teacher.logout');

    Route::get('/teacher/dashboard', fn () => view('teacher.dashboard'))
        ->name('teacher.dashboard');
});

Route::middleware('guest:teacher')->group(function () {
    Route::get('/teacher/register', [TeacherRegisteredUserController::class, 'create'])
        ->name('teacher.register');

    Route::post('/teacher/register', [TeacherRegisteredUserController::class, 'store'])
        ->name('teacher.register.store');
});
