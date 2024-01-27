<?php

use App\Http\Controllers\Api\AlbumsController;
use App\Http\Controllers\Api\DemoController;
use App\Http\Controllers\Api\LoginController;
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

Route::post('login', LoginController::class);

Route::middleware('auth:sanctum')->group(function(){

    //Route::get('albums', [AlbumsController::class, 'index']);

    Route::apiResource('albums', AlbumsController::class, [
        'as' => 'api'
    ]);
});
