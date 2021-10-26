<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CrudController;

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
//     return view('layouts.app');
// });

Route::get('/', [CrudController::class, 'index'])->name('home');

// Auth::routes();

// Crud
Route::group(['prefix' => 'crud_biasa'], function() {
    Route::get('/list', [CrudController::class, 'index'])->name('crud_biasa.list');
    Route::get('/form_tambah', [CrudController::class, 'form_tambah'])->name('crud_biasa.form_tambah');
    Route::post('/tambah_data', [CrudController::class, 'store'])->name('crud_biasa.tambah_data');
    Route::get('/form_edit/{id}', [CrudController::class, 'form_edit'])->name('crud_biasa.form_edit');
    Route::post('/update', [CrudController::class, 'update'])->name('crud_biasa.update');
    Route::get('/delete/{id}', [CrudController::class, 'destroy'])->name('crud_biasa.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});




