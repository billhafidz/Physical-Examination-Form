<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalExamController;

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

Route::get('/animal', [AnimalExamController::class, 'index'])->name('animal.index');
Route::post('/animal/store', [AnimalExamController::class, 'store'])->name('animal.store');
Route::get('/search/{patient_id}', [AnimalExamController::class, 'search']);
