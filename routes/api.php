<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('todo',App\Http\Controllers\TodoController::class);

Route::post('login', [App\Http\Controllers\AuthController::class,'login']);
Route::get('logout', [App\Http\Controllers\AuthController::class,'logout']);
Route::post('register', [App\Http\Controllers\AuthController::class,'register']);
Route::get('someting', [App\Http\Controllers\AuthController::class,'something']);