<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PajakController;
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

// Route::get('/', function () {
//     return view('admin.index');
// });
Route :: get("/",[LoginController::class,'showLoginForm'])->name('login');
Route::get('join', [KendaraanController::class, 'join'])->name('join');

Route ::prefix("pemilik")->group(function(){
Route::get('/', [PemilikController::class, 'index'])->name('pemilik.index');
Route::get('add', [PemilikController::class, 'create'])->name('pemilik.create');
Route::post('store', [PemilikController::class, 'store'])->name('pemilik.store');
Route::get('edit/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
Route::post('update/{id}', [PemilikController::class, 'update'])->name('pemilik.update');
Route::post('delete/{id}', [PemilikController::class, 'delete'])->name('pemilik.delete');
});
Route ::prefix("kendaraan")->group(function(){
Route::get('/', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('add', [KendaraanController::class, 'create'])->name('kendaraan.create');
Route::post('store', [KendaraanController::class, 'store'])->name('kendaraan.store');
Route::get('edit/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
Route::post('update/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
Route::post('delete/{id}', [KendaraanController::class, 'delete'])->name('kendaraan.delete');
Route::post('recycle/{id}', [KendaraanController::class, 'recycle'])->name('kendaraan.recycle');
Route::get('restore/{id}', [KendaraanController::class, 'restore'])->name('kendaraan.restore');
});
Route ::prefix("pajak")->group(function(){
    Route::get('/', [PajakController::class, 'index'])->name('pajak.index');
    Route::get('add', [PajakController::class, 'create'])->name('pajak.create');
    Route::post('store', [PajakController::class, 'store'])->name('pajak.store');
    Route::get('edit/{id}', [PajakController::class, 'edit'])->name('pajak.edit');
    Route::post('update/{id}', [PajakController::class, 'update'])->name('pajak.update');
    Route::post('delete/{id}', [PajakController::class, 'delete'])->name('pajak.delete');
    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
