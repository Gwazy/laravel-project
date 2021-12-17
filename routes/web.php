<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PathController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');




require __DIR__ . '/auth.php';
