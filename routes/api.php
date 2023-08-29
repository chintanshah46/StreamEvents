<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/revenues', [HomeController::class, 'getRevenues'])->name('revenues');

Route::middleware('auth:sanctum')->get('/followersGain', [HomeController::class, 'getFollowersGain'])->name('followersGain');

Route::middleware('auth:sanctum')->get('/topProducts', [HomeController::class, 'getTopProducts'])->name('topProducts');


