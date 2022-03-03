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
    return view('layouts.app');
});

// Home
Route::get('/posts', [PostController::class, 'index'])->name('posts');

// Contact me
Route::get('/contact', [ContactMeController::class, 'index'])->name('contact');
Route::post('/contact', [ContactMeController::class, 'store'])->name('store.contact');

// About me
Route::get('/aboutme', [AboutMeController::class, 'index'])->name('aboutme');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
