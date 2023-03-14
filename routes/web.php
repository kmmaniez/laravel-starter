<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {

    // Route Dashboard
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Products
    Route::resource('products', ProductController::class)->only(['index','create','store','edit','update','destroy']);
    
    // Route Blog (prefix) => localhost/blog/*
    Route::prefix('blog')->group(function () {

        // Default Route Blog prefix
        Route::view('/','admin.dashboard');

        // Route Post
        Route::resource('post', PostController::class)->only(['index','create','store','edit','update','destroy']);
        
        // Route Category
        Route::resource('category', CategoryController::class)->only(['index','create','store','edit','update','destroy']);
    });
});



require __DIR__.'/auth.php';
