<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\Scan;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/scan', [Scan::class, 'scan']);
Route::get('/barang/{id}', [Barang::class, 'show'])->name('barang.show');
