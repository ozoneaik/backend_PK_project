<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\QcProdController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);


    //Incentive


    //Products
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [QcProdController::class, 'index']);
        Route::post('/store', [QcProdController::class, 'store']);
        Route::get('edit/{id}', [QcProdController::class, 'edit']);
        Route::post('/update/{id}', [QcProdController::class, 'update']);

    });

});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/qc_year/{year}', [\App\Http\Controllers\GetQcYear::class, 'getQcYear']);

