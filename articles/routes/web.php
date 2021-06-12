<?php

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
    return view('home');
})->name('home');

Route::get('/register', [\App\Http\Controllers\User\UserController::class, 'registerCreate'])->name('user.registration');
Route::post('/register', [\App\Http\Controllers\User\UserController::class, 'registerStore']);
Route::get('/login', [\App\Http\Controllers\User\UserController::class, 'loginCreate'])->name('user.login');
Route::post('/login', [\App\Http\Controllers\User\UserController::class,'loginStore']);


Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\UserController::class,'index'])->name('user.dashboard');
    Route::get('/logout', [\App\Http\Controllers\User\UserController::class, 'logout'])->name('user.logout');
    Route::get('/newpost', [\App\Http\Controllers\User\PostController::class, 'create'])->name('user.newpost');
    Route::post('/newpost', [\App\Http\Controllers\User\PostController::class, 'store']);
    Route::get('/posts', [\App\Http\Controllers\User\PostController::class, 'index'])->name('user.posts');
    Route::get('/posts/update/{id}', [\App\Http\Controllers\User\PostController::class, 'updateCreate'])->name('user.posts.update');
    Route::post('/posts/update/{id}', [\App\Http\Controllers\User\PostController::class, 'updateStore']);
    Route::get('/posts/delete/{id}', [\App\Http\Controllers\User\PostController::class, 'delete'])->name('user.posts.delete');
});




