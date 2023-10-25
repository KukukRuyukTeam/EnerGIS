<?php

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
    return view('home');
});

Route::get('/peta', function () {
    return view('peta');
});

Route::get('/tentang', function () {
    return view('about');
});

Route::get('/energame', function () {
    return view('energame');
});

Route::prefix('pembangkit')->group(function () {
});

