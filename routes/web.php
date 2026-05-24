<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Public Profiles

Route::get('/users/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');

// Public News Routes


// everyone can see news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

// only admins can create news
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/news/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/news', [NewsController::class, 'store'])
        ->name('news.store');

    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])
        ->name('news.edit');

    Route::patch('/news/{news}', [NewsController::class, 'update'])
        ->name('news.update');

    Route::delete('/news/{news}', [NewsController::class, 'destroy'])
        ->name('news.destroy');
});

// single news article
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->name('news.show');

//Auth Routes

require __DIR__.'/auth.php';
