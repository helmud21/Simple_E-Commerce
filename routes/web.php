<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/post/login', [LoginController::class, 'login']);
Route::get('/registertoko', [RegisterController::class, 'createShop']);
Route::post('/user/create', [RegisterController::class, 'userCreate']);
Route::post('/shop/create', [RegisterController::class, 'shopInsert']);