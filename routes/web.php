<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rental', [RentalController::class, 'index']);
Route::get('/create', [RentalController::class, 'create'])->name('add');
Route::post('/store', [RentalController::class, 'store']);
Route::get('/rental/{id}', [RentalController::class, 'edit'])->name('edit');
Route::post('/rental/update/{id}', [RentalController::class, 'update']);
Route::post('rental/delete/{id}', [RentalController::class, 'destroy'])->name('destroy');
Route::get('/rental/trash/all', [RentalController::class, 'trash'])->name('trash');
Route::get('/rental/trash/restore/{id}', [RentalController::class, 'restore'])->name('restore');
Route::post('/rental/trash/permanent/{id}', [RentalController::class, 'permanentDelete'])->name('permanent');
