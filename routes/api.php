<?php

use App\Http\Controllers\API\CrewsController;
use App\Http\Controllers\API\PassportAuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Laravel Passport API
 */

// Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('logout', [PassportAuthController::class, 'logout']);
});

Route::middleware('auth:api')->prefix('crews')->group(function () {
    Route::get('/', [CrewsController::class, 'index'])->name('crews');
    Route::post('/create', [CrewsController::class, 'store'])->name('crews.store');
    Route::get('/view/{id}', [CrewsController::class, 'show'])->name('crews.view');
    Route::post('/edit/{id}', [CrewsController::class, 'update'])->name('crews.update');
    Route::get('/delete/{id}', [CrewsController::class, 'destroy'])->name('crews.delete');
});
