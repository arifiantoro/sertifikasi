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

Auth::routes();

use App\Http\Controllers\pesertas as peserta;

Route::get('/first', [peserta::class, 'index'])->middleware('auth');
Route::get('/sub/{id}', [peserta::class, 'sub'])->middleware('auth');

Route::get('/third/{id}', [peserta::class, 'edit'])->middleware('auth');
Route::post('/simpan', [peserta::class, 'store'])->middleware('auth');


use App\Http\Controllers\reminders as reminder;

Route::get('/fourth', [reminder::class, 'index'])->middleware('auth');
Route::get('/fifth/{id}', [reminder::class, 'remind'])->middleware('auth');
Route::get('/upload/{id}', [reminder::class, 'upload']);
Route::post('/update', [reminder::class, 'store']);

Route::get('kirim-email/{id}', 'App\Http\Controllers\MailController@index')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
