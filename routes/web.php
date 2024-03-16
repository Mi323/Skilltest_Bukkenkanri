<?php

use App\Http\Controllers\BukkenkanriController;
use App\Models\BukkenKanri;
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
    return view('bukkenkanri.index');
});

Route::get('/', [BukkenkanriController::class, 'index'])->name('index');
Route::post('/post', [BukkenkanriController::class, 'store'])->name('store');
Route::get('/edit/{id}', [BukkenkanriController::class, 'edit'])->name('bukkenkanri.edit');
Route::put('/update/{id}', [BukkenkanriController::class, 'update'])->name('bukkenkanri.update');
Route::post('/destroy/{id}', [BukkenkanriController::class, 'destroy'])->name('bukkenkanri.destroy');
