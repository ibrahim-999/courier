<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ShipmentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::match(['get','post'],'/',[AdminController::class,'login']);
        Route::group(['middleware'=>['admin']], function (){
            Route::get('dashboard', [AdminController::class,'dashboard']);
            Route::get('logout',[AdminController::class,'logout']);



            Route::get('couriers',[CourierController::class,'couriers']);
            Route::match(['get','post'],'add-edit-courier/{id?}',[CourierController::class,'addEditCourier']);
            Route::get('delete-courier/{id}',[CourierController::class,'deleteCourier']);


            Route::get('products',[ProductsController::class,'products']);
            Route::match(['get','post'],'add-edit-product/{id?}',[ProductsController::class,'addEditProduct']);
            Route::get('delete-product/{id}',[ProductsController::class,'deleteProduct']);


            Route::get('shipments',[ShipmentsController::class,'shipments']);
            Route::match(['get','post'],'add-edit-shipment/{id?}',[ShipmentsController::class,'addEditShipment']);
            Route::get('delete-shipment/{id}',[ShipmentsController::class,'deleteShipment']);


    });
});
