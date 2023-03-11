<?php

use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    // return view('auth.login');
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('products', ProductController::class)->only(['index','create','store','edit','update','destroy']);

Route::prefix('blog')->group(function () {
    
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('post', PostController::class)->only(['index','create','store','edit','update','destroy']);
    Route::resource('category', CategoryController::class)->only(['index','create','store','edit','update','destroy']);
    
});