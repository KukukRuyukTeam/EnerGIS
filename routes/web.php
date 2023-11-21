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

Route::get('/pembangkit', function () {
    return view('pembangkit_listrik');
});

Route::get('/tentang', function () {
    return view('about');
});

Route::get('/energame', function () {
    return view('energame');
});

Route::get('/soal', function () {
    return view('soal');
});

Route::get('/rangking', function () {
    return view('rangking');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/admin', function () {
    return view('admin/login');
});

Route::get('/admin_pembangkit', function () {
    return view('admin/admin_pembangkit_listrik');
});

Route::post('/admin/login',[\App\Http\Controllers\AdminController::class, 'loginAdmin'])->name('login.perform');

Route::prefix('pembangkit')->group(function () {
});



