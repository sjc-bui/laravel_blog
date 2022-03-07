<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\CategoryController;

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
    Route::get('/home/posts/{id}', [HomeController::class, 'show'])->name('posts.show');
    Route::get('/home/posts/{id}/edit', [HomeController::class, 'edit'])->name('posts.edit');
    Route::get('/home/posts', [HomeController::class, 'create'])->name('posts.create');
    Route::post('/home/posts', [HomeController::class, 'store'])->name('posts.store');
    Route::delete('/home/posts/{id}', [HomeController::class, 'destroy'])->name('posts.destroy');
    Route::put('/home/posts/{id}', [HomeController::class, 'update'])->name('posts.update');

    // abouts
    Route::get('/abouts', [AboutMeController::class, 'abouts'])->name('abouts');
    Route::post('/abouts', [AboutMeController::class, 'store'])->name('abouts.store');
    Route::delete('/abouts/{id}', [AboutMeController::class, 'destroy'])->name('abouts.destroy');

    // contacts
    Route::get('/contacts', [ContactMeController::class, 'contacts'])->name('contacts');
    Route::get('/contacts/{id}', [ContactMeController::class, 'show'])->name('contacts.show');
    Route::post('/contacts/read', [ContactMeController::class, 'markAllAsRead'])->name('contacts.read');
    Route::delete('/contacts/{id}', [ContactMeController::class, 'destroy'])->name('contacts.destroy');

    // categories
    Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
