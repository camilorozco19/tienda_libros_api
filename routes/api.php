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

Route::prefix('v1')->group(function () {
    Route::get('saludo', function () {
        return response()->json([
            'success' => true,
            'data' => [
            'name' =>'Mario',
            'email' => 'mariogmail.com',
            'age' => 25,
            ] 
        ]);
    });
});