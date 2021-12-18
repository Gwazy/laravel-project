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


//  Posts
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])
    ->middleware(('auth'))
    ->name('posts.edit');
Route::post('/posts/edit/{id}', [PostController::class, 'update'])
    ->middleware('auth')
    ->name('posts.update');



Route::get('/posts/create', [PostController::class, 'create'])
    ->middleware('auth')
    ->name('create');
Route::get('/posts', [PostController::class, 'index'])
    ->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show'])
    ->middleware('auth')
    ->name('posts.show');
Route::post('posts', [PostController::class, 'store'])
    ->middleware('auth')
    ->name('posts.store');
//  Comments



//  Posts
Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('profile.index');




require __DIR__ . '/auth.php';
