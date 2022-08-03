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
Route::get('/third/{id}', [peserta::class, 'edit']);
Route::post('/simpan', [peserta::class, 'store']);

use App\Http\Controllers\sertifikasis as sertifikasi;

Route::get('/second', [sertifikasi::class, 'index']);

use App\Http\Controllers\reminders as reminder;

Route::get('/fourth', [reminder::class, 'index']);
Route::get('/fifth/{id}', [reminder::class, 'remind']);
// Route::get('/fifth', function () {
//     return view('fifth');
// });
