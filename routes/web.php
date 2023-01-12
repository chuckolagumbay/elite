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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('crews')->middleware('auth')->group(function () {
    Route::get('/view/{id}', [App\Http\Controllers\CrewsController::class, 'show'])->name('crews.view');

    Route::get('/', [App\Http\Controllers\CrewsController::class, 'index'])->name('crews');
    Route::get('/create', [App\Http\Controllers\CrewsController::class, 'create'])->name('crews.create');
    Route::post('/create', [App\Http\Controllers\CrewsController::class, 'store'])->name('crews.store');
    Route::get('/edit/{id}', [App\Http\Controllers\CrewsController::class, 'edit'])->name('crews.edit');
    Route::post('/edit/{id}', [App\Http\Controllers\CrewsController::class, 'update'])->name('crews.update');
    Route::get('/delete/{id}', [App\Http\Controllers\CrewsController::class, 'destroy'])->name('crews.delete');
});

Route::prefix('document')->middleware('auth')->group(function () {
    Route::get('/view/{id}', [App\Http\Controllers\DocumentsController::class, 'show'])->name('documents.view');

    Route::get('/', [App\Http\Controllers\DocumentsController::class, 'index'])->name('documents');
    Route::get('/create/{crew}', [App\Http\Controllers\DocumentsController::class, 'create'])->name('documents.create');
    Route::post('/create/{crew}', [App\Http\Controllers\DocumentsController::class, 'store'])->name('documents.store');
    Route::get('/edit/{id}', [App\Http\Controllers\DocumentsController::class, 'edit'])->name('documents.edit');
    Route::post('/edit/{id}', [App\Http\Controllers\DocumentsController::class, 'update'])->name('documents.update');
    Route::get('/delete/{id}', [App\Http\Controllers\DocumentsController::class, 'destroy'])->name('documents.delete');
});
