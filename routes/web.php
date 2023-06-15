<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

Route::controller(PageController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/show-public/{slug}','showPublic')->name('showPublic');
    Route::get('/category/{slug}','category')->name('category');
});


Route::resource('comment',CommentController::class)->only(['store','update','destroy'])->middleware('auth');

Auth::routes();


Route::middleware('auth')->group(function(){

    Route::prefix('dashboard')->group(function(){
        Route::resource('article',ArticleController::class);
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/users-list',[HomeController::class, 'users'])->name('users')->middleware('can:admin-only');
        Route::resource('category',CategoryController::class)->middleware('can:viewAny,'.Category::class);
    });
    
});
