<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});
Route::get('/me', [AuthController::class, 'me']);

Route::get('/login', [LoginController::class, 'create'])->name('login');

Route::post('/store', [LoginController::class, 'store'])->name('store');

Route::get('/user', [LoginController::class, 'user'])->middleware('auth:sanctum');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');