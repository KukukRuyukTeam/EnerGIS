<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('pembangkit', [\App\Http\Controllers\PembangkitController::class, 'insertPembangkit']);

Route::prefix('pembangkit')->group(function () {
    Route::post('/plta', [\App\Http\Controllers\PLTAController::class, 'insertPLTA']);
    Route::get('/plta/{id}', []);
    Route::put('/plta/{id}', []);
    Route::delete('/plta/delete/{id}', []);
});

