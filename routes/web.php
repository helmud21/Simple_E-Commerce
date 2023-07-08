<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\TokoController;

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
Route::get('/profile/{id}', [ProfileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->middleware('auth');

Route::get('/detail/{id}/barang', [HomeController::class, 'detailBarang']);
Route::post('/cari/barang', [HomeController::class, 'cariBarang'])->name('cari.barang');
Route::post('/post/selected/{id}', [HomeController::class, 'getSelected']);

// Gunakan route berikut jika ingin menampilkan data menggunakan datatables
Route::post('dataBarang', [TokoController::class, 'post'])->name('post.barang');
Route::post('getBarang', [HomeController::class, 'getData'])->name('get.barang');

Route::get('/dashboard/{id}/toko', [TokoController::class, 'index'])->name('dashboard.toko');
Route::get('/edit/barang/{id}', [TokoController::class, 'editBarang'])->name('edit.barang');
Route::get('/hapus/barang/{id}', [TokoController::class, 'hapusBarang'])->name('hapus.barang');
Route::post('/post/barang', [TokoController::class, 'postBarang']);

// Route pembelian
Route::get('/beli/barang/{id}', [PembelianController::class, 'beliBarang']);
Route::get('/pembelian/{id}', [PembelianController::class, 'dataPembelian']);
Route::post('/bayar/barang', [PembelianController::class, 'bayarBarang']);

//Route select2
Route::post('/select/kategori', [SelectController::class, 'selectCategory'])->name('select.kategori');
Route::get('/home/kategori', [HomeController::class, 'getSelected'])->name('get.selected');
