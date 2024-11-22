<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;


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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function() {
      Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
      Route::get('user', [AuthController::class, 'user']);
    });
});

Route::middleware('auth:api')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});


Route::middleware('auth:api')->get('/companies', [CompanyController::class, 'index']);
