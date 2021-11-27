<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Models\Authors;
use App\Http\Controllers\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ebook','App\Http\Controllers\BookController@index');
Route::post('/ebook', 'App\Http\Controllers\BookController@create');
Route::put('/ebook/{id}', 'App\Http\Controllers\BookController@update');
Route::delete('/ebook/{id}', 'App\Http\Controllers\BookController@delete');

Route::get('/me', [AuthController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('authors/{id}', [AuthorController::class, 'show']);
Route::put('authors/{id}', [AuthorController::class, 'update']);
Route::delete('authors/{id}', [AuthorController::class, 'destroy']);

//  login register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});