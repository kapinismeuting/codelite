<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\ImageController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\LoginController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('images', ImageController::class);
    Route::post('login', [LoginController::class, 'login']);
});

