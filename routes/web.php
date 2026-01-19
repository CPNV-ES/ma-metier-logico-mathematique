<?php

use App\Http\Controllers\Auth\TeacherAuthenticatedSessionController;
use App\Http\Controllers\Auth\TeacherRegisteredUserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


Route::prefix('homepage')
    ->name('homepage.')
    ->controller(HomepageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');                 // homepage.index
        Route::post('/', 'resolveClassByCode')->name('resolve');    // homepage.resolve

        Route::resource('classes', SchoolClassController::class)
            ->only(['show'])
            ->parameters(['classes' => 'schoolClass']);
    });

Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::middleware('guest:teacher')->group(function () {
        Route::get('login', [TeacherAuthenticatedSessionController::class, 'create'])
            ->name('login');
        Route::post('login', [TeacherAuthenticatedSessionController::class, 'store'])
            ->name('login.store');

        Route::get('register', [TeacherRegisteredUserController::class, 'create'])
            ->name('register');
        Route::post('register', [TeacherRegisteredUserController::class, 'store'])
            ->name('register.store');
    });

    Route::middleware('auth:teacher')->group(function () {
        Route::post('logout', [TeacherAuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        Route::view('dashboard', 'teacher.dashboard')
            ->name('dashboard'); // teacher.dashboard :contentReference[oaicite:7]{index=7}
    });
});

Route::redirect('/', '/homepage');
