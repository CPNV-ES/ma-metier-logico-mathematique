<?php

use App\Http\Controllers\Auth\TeacherAuthenticatedSessionController;
use App\Http\Controllers\Auth\TeacherRegisteredUserController;
use App\Http\Controllers\GameCategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\schoolclassgestionController;
use App\Http\Controllers\studentgestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::prefix('homepage')
    ->name('homepage.')
    ->controller(HomepageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');                 // homepage.index
        Route::post('/', 'resolveClassByCode')->name('resolve');    // homepage.resolve

        Route::resource('classes', SchoolClassController::class)
            ->only(['show'])
            ->parameters(['classes' => 'schoolClass']);

        Route::resource('gameCategories', GameCategoryController::class)
            ->only(['index'])
            ->parameters(['students' => 'student']);

        Route::resource('categories', CategoryController::class)
            ->only(['show'])
            ->parameters(['categories' => 'category']);
    });

Route::get('/homepage/{id}', [SchoolClassController::class, 'resolveStudentpage'])->name('findstudent');
Route::get('/homepage/category/{id}', [StudentController::class, 'resolveCategorypage'])->name('findcategory');

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
        Route::get('/schoolclass_gestion', [TeacherController::class, 'showClasses'])
            ->name('schoolclass_gestion');
        Route::post('/schoolclass_gestion', [TeacherController::class, 'showClassesFilter'])
            ->name('schoolclass_gestion_filtrer');
        Route::post('/newclass', [SchoolClassController::class, 'store'])
            ->name('newclass');
        Route::get('/student_gestion/{id}', [SchoolClassController::class, 'showStudents'])
            ->name('student_gestion');
        Route::post('/updateclass/{schoolClass}', [SchoolClassController::class, 'update'])
            ->name('updateclass');
        Route::get('/deleteclass/{schoolClass}', [SchoolClassController::class, 'destroy'])
            ->name('deleteclass');
        Route::post('/newstudent/{schoolClass}', [StudentController::class, 'store'])
            ->name('newstudent');
        Route::get('/student/{schoolClass}/{student}', [StudentController::class, 'show'])
            ->name('student');
        Route::get('/deletestudent/{schoolClass}/{student}', [StudentController::class, 'destroy'])
            ->name('deletestudent');
        Route::post('/updateclass/{schoolClass}/{student}', [StudentController::class, 'update'])
            ->name('updatestudent');
    });

    Route::get('/', [HomepageController::class, 'index']);
});
