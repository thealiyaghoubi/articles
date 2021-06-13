<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/register', [\App\Http\Controllers\Api\User\UserController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\User\UserController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('/logout', [\App\Http\Controllers\Api\User\UserController::class, 'logout']);
    Route::post('/newpost', [\App\Http\Controllers\Api\User\PostController::class, 'store']);
    Route::get('/posts', [\App\Http\Controllers\Api\User\PostController::class, 'show']);
    Route::post('/posts/update/{id}', [\App\Http\Controllers\Api\User\PostController::class, 'update']);
    Route::get('/posts/delete/{id}', [\App\Http\Controllers\Api\User\PostController::class, 'delete']);
});
