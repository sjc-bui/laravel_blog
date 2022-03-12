<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;

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

// Language
Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{slug}.{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/category/{slug}', [PostController::class, 'getByCategory'])->name('posts.category');

// Search
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

// Contact me
Route::get('/contact', [ContactMeController::class, 'index'])->name('contact');
Route::post('/contact', [ContactMeController::class, 'store'])->name('store.contact');

// About me
Route::get('/aboutme', [AboutMeController::class, 'index'])->name('aboutme');

// Comment
Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
    Route::post('/{post}', [CommentController::class, 'store'])->name('store');
});

// Reply
Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    Route::post('/{comment}', [ReplyController::class, 'store'])->name('store');
});

// ----------------------------- Admin page -----------------------------
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {

    // posts
    Route::get('/home', [HomeController::class, 'index'])->name('posts.index');
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
    Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
        Route::get('/', [ContactMeController::class, 'contacts'])->name('index');
        Route::get('/{id}', [ContactMeController::class, 'show'])->name('show');
        Route::post('/read', [ContactMeController::class, 'markAllAsRead'])->name('read');
        Route::delete('/{id}', [ContactMeController::class, 'destroy'])->name('destroy');
    });

    // categories
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'categories'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
});
