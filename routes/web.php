<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [MainController::class, 'index']);
Route::get('/print', [MainController::class, 'print']);
Route::get('/add', [MainController::class, 'create']);
Route::get('/edit/{id}', [MainController::class, 'edit']);
Route::post('/save', [MainController::class, 'store']);
Route::put('/update', [MainController::class, 'update']);
Route::get('/delete/{id}', [MainController::class, 'destroy']);
