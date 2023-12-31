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
//Route::middleware(\App\Http\Middleware\AdminAuthMiddleware::class)->group(function () {
    Route::get('/admin/current',        [\App\Http\Controllers\AdminController::class, 'get']);
    Route::post('/admin/logout',        [\App\Http\Controllers\AdminController::class, 'logoutAdmin']);

    Route::prefix('pembangkit')->group(function () {
        Route::post('/plta',                [\App\Http\Controllers\PLTAController::class, 'insertPLTA']);
        Route::post('/plta/update/{id}',            [\App\Http\Controllers\PLTAController::class, 'updatePLTA']);
        Route::post('/plta/delete/{id}',         [\App\Http\Controllers\PLTAController::class, 'deletePLTA']);

        Route::post('/plts',                [\App\Http\Controllers\PLTSController::class, 'insertPLTS']);
        Route::post('/plts/update/{id}',            [\App\Http\Controllers\PLTSController::class, 'updatePLTS']);
        Route::post('/plts/delete/{id}',         [\App\Http\Controllers\PLTSController::class, 'deletePLTS']);

        Route::post('/pltbm',                [\App\Http\Controllers\PLTBmController::class, 'insertPLTBm']);
        Route::post('/pltbm/update/{id}',            [\App\Http\Controllers\PLTBmController::class, 'updatePLTBm']);
        Route::post('/pltbm/delete/{id}',         [\App\Http\Controllers\PLTBmController::class, 'deletePLTBm']);

        Route::post('/pltm',                [\App\Http\Controllers\PLTMController::class, 'insertPLTM']);
        Route::post('/pltm/update/{id}',            [\App\Http\Controllers\PLTMController::class, 'updatePLTM']);
        Route::post('/pltm/delete/{id}',         [\App\Http\Controllers\PLTMController::class, 'deletePLTM']);

        Route::post('/pltmh',                [\App\Http\Controllers\PLTMHController::class, 'insertPLTMH']);
        Route::post('/pltmh/update/{id}',            [\App\Http\Controllers\PLTMHController::class, 'updatePLTMH']);
        Route::post('/pltmh/delete/{id}',         [\App\Http\Controllers\PLTMHController::class, 'deletePLTMH']);

        Route::post('/pltp',                [\App\Http\Controllers\PLTPController::class, 'insertPLTP']);
        Route::post('/pltp/update/{id}',            [\App\Http\Controllers\PLTPController::class, 'updatePLTP']);
        Route::post('/pltp/delete/{id}',         [\App\Http\Controllers\PLTPController::class, 'deletePLTP']);

        Route::post('/pltb',                [\App\Http\Controllers\PLTBController::class, 'insertPLTB']);
        Route::post('/pltb/update/{id}',            [\App\Http\Controllers\PLTBController::class, 'updatePLTB']);
        Route::post('/pltb/delete/{id}',         [\App\Http\Controllers\PLTBController::class, 'deletePLTB']);
    });

//});

// [[ Public function ]] //
Route::prefix('pembangkit')->group(function () {

    Route::prefix('plta')->group(function () {
        Route::get('/',                [\App\Http\Controllers\PLTAController::class, 'getPLTAs']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTAController::class, 'getPLTAbyQuery']);
        Route::get("/nearby",          [\App\Http\Controllers\PLTAController::class, 'getPLTANearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTAController::class, 'getPLTAbyID']);
    });

    Route::prefix('plts')->group(function () {
        Route::get('/',               [\App\Http\Controllers\PLTSController::class, 'getPLTSs']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTSController::class, 'getPLTSbyQuery']);
        Route::get('/nearby',          [\App\Http\Controllers\PLTSController::class, 'getPLTSNearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTSController::class, 'getPLTSbyID']);
    });

    Route::prefix('pltbm')->group(function () {
        Route::get('/',               [\App\Http\Controllers\PLTBmController::class, 'getPLTBms']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTBmController::class, 'getPLTBmbyQuery']);
        Route::get('/nearby',          [\App\Http\Controllers\PLTBmController::class, 'getPLTBmNearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTBmController::class, 'getPLTBmbyID']);
    });

    Route::prefix('pltm')->group(function () {
        Route::get('/',               [\App\Http\Controllers\PLTMController::class, 'getPLTMs']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTMController::class, 'getPLTMbyQuery']);
        Route::get('/nearby',          [\App\Http\Controllers\PLTMController::class, 'getPLTMNearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTMController::class, 'getPLTMbyID']);
    });

    Route::prefix('pltmh')->group(function () {
        Route::get('/',               [\App\Http\Controllers\PLTMHController::class, 'getPLTMHs']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTMHController::class, 'getPLTMbyQuery']);
        Route::get('/nearby',          [\App\Http\Controllers\PLTMHController::class, 'getPLTMHNearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTMHController::class, 'getPLTMHbyID']);
    });

    Route::prefix('pltp')->group(function () {
        Route::get('/',                [\App\Http\Controllers\PLTPController::class, 'getPLTPs']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTPController::class, 'getPLTPbyQuery']);
        Route::get('/nearby',          [\App\Http\Controllers\PLTPController::class, 'getPLTPNearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTPController::class, 'getPLTPbyID']);
    });

    Route::prefix('pltb')->group(function () {
        Route::get('/',               [\App\Http\Controllers\PLTBController::class, 'getPLTBs']);
        Route::get('/query/{query}',   [\App\Http\Controllers\PLTBController::class, 'getPLTBbyQuery']);
        Route::get('/nearby',          [\App\Http\Controllers\PLTBController::class, 'getPLTBNearby']);
        Route::get('/{id}',            [\App\Http\Controllers\PLTBController::class, 'getPLTBbyID']);
    });

});

Route::post('/chat',                    [\App\Http\Controllers\ChatAIController::class, 'getAnswear']);
Route::post('/createquestion',          [\App\Http\Controllers\QuizController::class, 'createQuestion']);
Route::post('/validateanswear',         [\App\Http\Controllers\QuizController::class, 'validateAnswear']);
Route::post('/getquestion',       [\App\Http\Controllers\QuizController::class, 'getQuestions']);
Route::get('/getranks/{kode}',           [\App\Http\Controllers\QuizController::class, 'getRankbyKode']);

Route::get('/spklu/nearby',             [\App\Http\Controllers\SPKLUController::class, 'getSPKLUNearby']);
Route::get('/spklu/query/{query}',      [\App\Http\Controllers\SPKLUController::class, 'getSPKLUbyQuery']);
Route::get('/spklus',                   [\App\Http\Controllers\SPKLUController::class, 'getSPKLUbyPage']);
Route::get('/spklu/{id}',               [\App\Http\Controllers\SPKLUController::class, 'getSPKLUbyID']);
Route::post('/spklu',                   [\App\Http\Controllers\SPKLUController::class, 'insertSPKLU']);
Route::put('/spklu/{id}',               [\App\Http\Controllers\SPKLUController::class, 'updateSPKLU']);
Route::delete('/spklu/{id}',            [\App\Http\Controllers\SPKLUController::class, 'deleteSPKLU']);

