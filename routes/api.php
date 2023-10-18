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

Route::post('/admin/login',             [\App\Http\Controllers\AdminController::class, 'loginAdmin']);
Route::post('/admin',                   [\App\Http\Controllers\AdminController::class, 'registerAdmin']);


// [[ Hanya untuk fungsi admin yang menggunakan TOKEN ]] //
Route::middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->group(function () {
    Route::get('/admin/current',        [\App\Http\Controllers\AdminController::class, 'get']);
    Route::post('/admin/logout',        [\App\Http\Controllers\AdminController::class, 'logoutAdmin']);

    Route::prefix('pembangkit')->group(function () {
        Route::post('/plta',                [\App\Http\Controllers\PLTAController::class, 'insertPLTA']);
        Route::put('/plta/{id}',            [\App\Http\Controllers\PLTAController::class, 'updatePLTA']);
        Route::delete('/plta/{id}',         [\App\Http\Controllers\PLTAController::class, 'deletePLTA']);

        Route::post('/plts',                [\App\Http\Controllers\PLTSController::class, 'insertPLTS']);
        Route::put('/plts/{id}',            [\App\Http\Controllers\PLTSController::class, 'updatePLTS']);
        Route::delete('/plts/{id}',         [\App\Http\Controllers\PLTSController::class, 'deletePLTS']);

        Route::post('/pltbm',                [\App\Http\Controllers\PLTBmController::class, 'insertPLTBm']);
        Route::put('/pltbm/{id}',            [\App\Http\Controllers\PLTBmController::class, 'updatePLTBm']);
        Route::delete('/pltbm/{id}',         [\App\Http\Controllers\PLTBmController::class, 'deletePLTBm']);

        Route::post('/pltm',                [\App\Http\Controllers\PLTMController::class, 'insertPLTM']);
        Route::put('/pltm/{id}',            [\App\Http\Controllers\PLTMController::class, 'updatePLTM']);
        Route::delete('/pltm/{id}',         [\App\Http\Controllers\PLTMController::class, 'deletePLTM']);

        Route::post('/pltmh',                [\App\Http\Controllers\PLTMHController::class, 'insertPLTMH']);
        Route::put('/pltmh/{id}',            [\App\Http\Controllers\PLTMHController::class, 'updatePLTMH']);
        Route::delete('/pltmh/{id}',         [\App\Http\Controllers\PLTMHController::class, 'deletePLTMH']);

        Route::post('/pltp',                [\App\Http\Controllers\PLTPController::class, 'insertPLTP']);
        Route::put('/pltp/{id}',            [\App\Http\Controllers\PLTPController::class, 'updatePLTP']);
        Route::delete('/pltp/{id}',         [\App\Http\Controllers\PLTPController::class, 'deletePLTP']);

        Route::post('/pltb',                [\App\Http\Controllers\PLTBController::class, 'insertPLTB']);
        Route::put('/pltb/{id}',            [\App\Http\Controllers\PLTBController::class, 'updatePLTB']);
        Route::delete('/pltb/{id}',         [\App\Http\Controllers\PLTBController::class, 'deletePLTB']);
    });

});

// [[ Public function ]] //
Route::prefix('pembangkit')->group(function () {
    Route::get('/plta/query/{query}',   [\App\Http\Controllers\PLTAController::class, 'getPLTAbyQuery']);
    Route::get('/pltas',                [\App\Http\Controllers\PLTAController::class, 'getPLTAbyPage']);
    Route::get("/plta/nearby",          [\App\Http\Controllers\PLTAController::class, 'getPLTANearby']);
    Route::get('/plta/{id}',            [\App\Http\Controllers\PLTAController::class, 'getPLTAbyID']);

    Route::get('/plts/query/{query}',   [\App\Http\Controllers\PLTSController::class, 'getPLTSbyQuery']);
    Route::get('/pltss/',               [\App\Http\Controllers\PLTSController::class, 'getPLTSbyPage']);
    Route::get('/plts/nearby',          [\App\Http\Controllers\PLTSController::class, 'getPLTSNearby']);
    Route::get('/plts/{id}',            [\App\Http\Controllers\PLTSController::class, 'getPLTSbyID']);

    Route::get('/pltbm/query/{query}',   [\App\Http\Controllers\PLTBmController::class, 'getPLTBmbyQuery']);
    Route::get('/pltbms/',               [\App\Http\Controllers\PLTBmController::class, 'getPLTBmbyPage']);
    Route::get('/pltbm/nearby',          [\App\Http\Controllers\PLTBmController::class, 'getPLTBmNearby']);
    Route::get('/pltbm/{id}',            [\App\Http\Controllers\PLTBmController::class, 'getPLTBmbyID']);

    Route::get('/pltm/query/{query}',   [\App\Http\Controllers\PLTMController::class, 'getPLTMbyQuery']);
    Route::get('/pltms/',               [\App\Http\Controllers\PLTMController::class, 'getPLTMbyPage']);
    Route::get('/pltm/nearby',          [\App\Http\Controllers\PLTMController::class, 'getPLTMNearby']);
    Route::get('/pltm/{id}',            [\App\Http\Controllers\PLTMController::class, 'getPLTMbyID']);

    Route::get('/pltmh/query/{query}',   [\App\Http\Controllers\PLTMHController::class, 'getPLTMbyQuery']);
    Route::get('/pltmhs/',               [\App\Http\Controllers\PLTMHController::class, 'getPLTMHbyPage']);
    Route::get('/pltmh/nearby',          [\App\Http\Controllers\PLTMHController::class, 'getPLTMHNearby']);
    Route::get('/pltmh/{id}',            [\App\Http\Controllers\PLTMHController::class, 'getPLTMHbyID']);

    Route::get('/pltp/query/{query}',   [\App\Http\Controllers\PLTPController::class, 'getPLTPbyQuery']);
    Route::get('/pltp/nearby',          [\App\Http\Controllers\PLTPController::class, 'getPLTPNearby']);
    Route::get('/pltps',                [\App\Http\Controllers\PLTPController::class, 'getPLTPbyPage']);
    Route::get('/pltp/{id}',            [\App\Http\Controllers\PLTPController::class, 'getPLTPbyID']);

    Route::get('/pltb/query/{query}',   [\App\Http\Controllers\PLTBController::class, 'getPLTBbyQuery']);
    Route::get('/pltbs/',               [\App\Http\Controllers\PLTBController::class, 'getPLTBbyPage']);
    Route::get('/pltb/nearby',          [\App\Http\Controllers\PLTBController::class, 'getPLTBNearby']);
    Route::get('/pltb/{id}',            [\App\Http\Controllers\PLTBController::class, 'getPLTBbyID']);
});


Route::get('/spklu/nearby',             [\App\Http\Controllers\SPKLUController::class, 'getSPKLUNearby']);
Route::get('/spklu/query/{query}',      [\App\Http\Controllers\SPKLUController::class, 'getSPKLUbyQuery']);
Route::get('/spklus',                   [\App\Http\Controllers\SPKLUController::class, 'getSPKLUbyPage']);
Route::get('/spklu/{id}',               [\App\Http\Controllers\SPKLUController::class, 'getSPKLUbyID']);
Route::post('/spklu',                   [\App\Http\Controllers\SPKLUController::class, 'insertSPKLU']);
Route::put('/spklu/{id}',               [\App\Http\Controllers\SPKLUController::class, 'updateSPKLU']);
Route::delete('/spklu/{id}',            [\App\Http\Controllers\SPKLUController::class, 'deleteSPKLU']);

