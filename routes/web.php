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

use App\Http\Controllers\CarController;

Route::get('/', [CarController::class, 'index']);
Route::get('/create', [CarController::class, 'create'])->middleware('auth');
Route::get('/dashboard', [CarController::class, 'dashboard'])->middleware('auth');
Route::get('/{id}', [CarController::class, 'show']);
Route::post('/', [CarController::class, 'store']);
Route::delete('/{id}', [CarController::class, 'destroy'])->middleware('auth');
Route::get('/edit/{id}', [CarController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [CarController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});
