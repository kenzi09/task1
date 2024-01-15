<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/siswa')->name('siswa.')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('home');
        Route::get('/create', [SiswaController::class, 'create'])->name('create');
        Route::post('/store', [SiswaController::class, 'store'])->name('store');
        Route::get('/{id}', [SiswaController::class, 'edit'])->name('edit');
        
        Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}', [SiswaController::class, 'update'])->name('update');
});