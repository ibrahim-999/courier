<?php

use App\Http\Controllers\Admin\API\ShipmentController;
use App\Http\Controllers\Admin\API\UserAuthController;
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


Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

// Private Routes
// These Routes Must Be Accessed Via Access Token For Logged-in User
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/index', [ShipmentController::class, 'index']);
    Route::get('/search', [ShipmentController::class, 'search']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
});

// Public Routes
// These Routes Would Be Accessed By Guest Users
Route::get('/index', [ShipmentController::class, 'index']);
Route::get('/search', [ShipmentController::class, 'search']);
