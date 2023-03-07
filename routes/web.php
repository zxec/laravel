<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::name('profile.')->middleware('auth')->controller(ProfileController::class)->group(function () {
//     Route::get('/profile', 'edit')->name('edit');
//     Route::patch('/profile', 'update')->name('update');
//     Route::delete('/profile', 'destroy')->name('destroy');
// });

Route::resource('profile', ProfileController::class)->only([
    'edit', 'update', 'destroy'
])->middleware('auth');

Route::controller(PagesController::class)->group(function () {
    Route::get('/contact', 'contact');
    Route::get('/about', 'about');
});

Route::get('tags/{tags}', [TagsController::class, 'show']);

Route::resource('/articles', ArticlesController::class)->except('index')->middleware('auth');

Route::get('/articles', [ArticlesController::class, 'index']);

require __DIR__ . '/auth.php';
