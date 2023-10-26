<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswacontroller;

Route::resource('siswa', siswacontroller::class)->except(['update']);
Route::put('siswa/{siswa}', 'siswacontroller@update')->name('siswa.edit');



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

Route::resource('siswa',siswacontroller::class);

