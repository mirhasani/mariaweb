<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PortfolioController;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/portfolios',[PortfolioController::class, 'getPortfolioUser1']);

Route::prefix('admin')->group(function(){
    Route::post('/send-vc', [AuthController::class, 'verify']);
    Route::post('/auth', [AuthController::class, 'auth']);
    Route::apiResource('/portfolios',PortfolioController::class)->middleware('auth:api');
    Route::get('/public/portfolios',[PortfolioController::class ,'public'])->middleware('auth:api');
    Route::apiResource('/likes',LikeController::class)->middleware('auth:api');
    Route::post('/likes/{portfolioId}',[LikeController::class , 'setLike'] )->middleware('auth:api');

});

