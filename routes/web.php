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

Route::get('/admin', function () {
    return view('adminlte');
});

// Route::get('/first', function () {
//     return view('first');
// });

use App\Http\Controllers\pesertas as peserta;

Route::get('/first', [peserta::class, 'index']);

use App\Http\Controllers\sertifikasis as sertifikasi;

Route::get('/second', [sertifikasi::class, 'index']);
