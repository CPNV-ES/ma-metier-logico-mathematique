<?php

use App\Http\Controllers\Auth\TeacherRegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TeacherAuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
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
