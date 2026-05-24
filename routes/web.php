<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('news', NewsController::class);

});

/*
|--------------------------------------------------------------------------
| Public profiles
|--------------------------------------------------------------------------
*/

Route::get('/users/{user}', [ProfileController::class, 'show'])
    ->name('profile.show');

/*
|--------------------------------------------------------------------------
| News Routes
|--------------------------------------------------------------------------
*/

// public pages
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->name('news.show');

// authenticated users
Route::middleware('auth')->group(function () {

    Route::get('/news/create', [NewsController::class, 'create'])
        ->name('news.create');

    Route::post('/news', [NewsController::class, 'store'])
        ->name('news.store');

});

require __DIR__.'/auth.php';
