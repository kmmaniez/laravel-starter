<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
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
    Route::view('/', 'admin.dashboard',[
        'categories_count'  => Category::all()->lazy()->count(),
        'posts_count'       => Post::all()->count(),
        'products_count'    => Product::all()->count(),
        'users_count'       => User::all()->count(),
    ])->name('dashboard');

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Products
    Route::resource('products', ProductController::class)->only(['index','create','store','edit','update','destroy']);
    
    // Route Blog (prefix) => localhost/blog/*
    Route::prefix('blog')->group(function () {

        // Default Route Blog prefix
        Route::get('/', fn() => redirect()->route('dashboard'));
        // Route Post
        Route::resource('post', PostController::class)->only(['index','create','store','show','edit','update','destroy']);
        // Route Category
        Route::resource('category', CategoryController::class)->only(['index','store','show','update','destroy']);
    });
});
Route::get('/blog/post/checkSlug', [PostController::class, 'checkSlug']);




require __DIR__.'/auth.php';
