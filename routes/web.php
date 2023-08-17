<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// auth()->onceUsingId(1);

Route::get('/', [ArticleController::class, 'index'])->name('home');

// Route::get('/articles', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::controller(ArticleController::class)->group(function () {
//     Route::get('/', [ArticleController::class, 'index'])->name('index');
//     Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('edit');
//     Route::patch('/{article}', [ArticleController::class, 'update'])->name('update');
//     Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('destroy');
// })->prefix('articles')->as('articles.');

Route::resource('articles', ArticleController::class)->names('article')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
