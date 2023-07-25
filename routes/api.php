<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\v1\Auth\AuthController;


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

Route::prefix('v1')->group(function () {

  Route::post('register', [AuthController::class, 'register']);
  Route::post('login', [Authcontroller::class, 'login']);

  Route::group(['middleware' => 'jwt.auth'], function () {

    Route::post('me', [AuthController::class, 'me']);
    Route::post('logout', [Authcontroller::class, 'logout']);

  

  });
  Route::apiResource('books', BookController::class);
});