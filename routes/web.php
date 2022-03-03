<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\AboutMeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('posts'));
});

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');

// Contact me
Route::get('/contact', [ContactMeController::class, 'index'])->name('contact');
Route::post('/contact', [ContactMeController::class, 'store'])->name('store.contact');

// About me
Route::get('/aboutme', [AboutMeController::class, 'index'])->name('aboutme');

// ----------------------------- Admin page -----------------------------
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function() {
    // posts
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // abouts
    Route::get('/abouts', [AboutMeController::class, 'abouts'])->name('abouts');
    Route::post('/abouts', [AboutMeController::class, 'store'])->name('abouts.store');
});
