<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\HomeController;
use App\Http\Controller\LoginController;
use App\Http\Controller\GuruController;
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
    return view("auth\login");
});


Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/dokumen', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// route guru

Route::get('/dokumen/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru.index');
Route::get('/dokumen/guru/create', [App\Http\Controllers\GuruController::class, 'create'])->name('guru.create');
Route::post('/dokumen/guru', [App\Http\Controllers\GuruController::class, 'store'])->name('guru.store');
Route::get('/dokumen/guru/edit/{id_guru}', [App\Http\Controllers\GuruController::class, 'edit'])->name('guru.edit');
Route::put('/dokumen/guru/update/{id_guru}', [App\Http\Controllers\GuruController::class, 'update'])->name('guru.update');
Route::delete('/dokumen/guru/delete/{id_guru}', [App\Http\Controllers\GuruController::class, 'delete'])->name('guru.delete');


// route alumni

Route::get('/dokumen/alumni', [App\Http\Controllers\AlumniController::class, 'index'])->name('alumni.index');
Route::get('/dokumen/alumni/create', [App\Http\Controllers\AlumniController::class, 'create'])->name('alumni.create');
Route::post('/dokumen/alumni', [App\Http\Controllers\AlumniController::class, 'store'])->name('alumni.store');
Route::get('/dokumen/alumni/edit/{id_alumni}', [App\Http\Controllers\AlumniController::class, 'edit'])->name('alumni.edit');
Route::put('/dokumen/alumni/update/{id_alumni}', [App\Http\Controllers\AlumniController::class, 'update'])->name('alumni.update');
Route::delete('/dokumen/alumni/delete/{id_alumni}', [App\Http\Controllers\AlumniController::class, 'delete'])->name('alumni.delete');

// route kelas

Route::get('/dokumen/kelas', [App\Http\Controllers\KelasController::class, 'index'])->name('kelas.index');
Route::get('/dokumen/kelas/create', [App\Http\Controllers\KelasController::class, 'create'])->name('kelas.create');
Route::post('/dokumen/kelas', [App\Http\Controllers\KelasController::class, 'store'])->name('kelas.store');
Route::get('/dokumen/kelas/edit/{id_kelas}', [App\Http\Controllers\KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/dokumen/kelas/update/{id_kelas}', [App\Http\Controllers\KelasController::class, 'update'])->name('kelas.update');
Route::delete('/dokumen/kelas/delete/{id_kelas}', [App\Http\Controllers\KelasController::class, 'delete'])->name('kelas.delete');
