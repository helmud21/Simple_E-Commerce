<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

//Route Registrasi
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/user/create', [RegisterController::class, 'userCreate']);

// Route Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/post/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route profile user
Route::get('/profile/{id}', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->middleware('auth');