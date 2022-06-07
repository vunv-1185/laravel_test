<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
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

Route::post('/auth/login', [AuthController::class, 'login']);
Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth',
], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user',
], function () {
    Route::get('/profile', [UserController::class, 'getUser']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
