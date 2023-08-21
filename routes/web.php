<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

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

auth()->onceUsingId(1);

Route::get('admin', function () {
    return view('dashboard');
})->name('admin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    //group articles route
    Route::group(['prefix' => 'articles', 'as' => 'articles.'], function () {
        Route::get('/', [AdminArticleController::class, 'index'])->name('index');
        Route::get('/create', [AdminArticleController::class, 'create'])->name('create');
        Route::get('/edit/{article}', [AdminArticleController::class, 'edit'])->name('edit');
        Route::post('/create', [AdminArticleController::class, 'store'])->name('store');
        Route::post('/update/{article}', [AdminArticleController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::get('/edit/{category}', [TagController::class, 'edit'])->name('edit');
        Route::post('/create', [TagController::class, 'store'])->name('store');
        Route::post('/update/{category}', [TagController::class, 'update'])->name('update');
    });
});

Route::get('/', function () {
    $articles = Article::latest()
        ->paginate(6);
    return view('welcome', [
        'articles' => $articles
    ]);
})->name('home');

Route::get('about-us', function () {
    return view('about-us');
})->name('about-us');


Route::resource('articles', ArticleController::class)->names('article')->parameters([
    'articles' => 'article:slug',
]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
