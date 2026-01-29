<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\userController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cars', [CarController::class, 'loadCars']);
Route::get('/cars/{brandName}/{id}',[CarController::class, 'loadCar']);
Route::post('/cars', [CarController::class, 'createCar']);
Route::patch('/cars/{id}', [CarController::class, 'updateCar']);
Route::delete('/cars/{id}', [CarController::class, 'deleteCar']);

Route::get('/cars/{brandName}' , [CarController::class, 'loadbrandCars']);


Route::get('/brands' ,[BrandController::class, 'loadBrands']);
Route::post('/brands', [BrandController::class, 'createBrand']);
Route::get('/brands/{name}' , [BrandController::class, 'loadBrand']);
Route::patch('/brands/{name}' , [BrandController::class , 'updateBrand']);
Route::delete('/brands/{name}' , [BrandController::class, 'deleteBrand']);

Route::get('/checkout/rent/{id}', [RentController::class, 'loadAllRentOrders']);
Route::post('/checkout/rent/{id}/{carID}' ,[RentController::class, 'CreateOrder']);
Route::delete('/checkout/rent/{id}/{carID}' ,[RentController::class, 'deleteOrder']);
Route::patch('/checkout/rent/{id}/{carID}' ,[RentController::class, 'updateOrder']);


Route::post('/register',[UsersController::class,'register']);
Route::post('/login',[UsersController::class,'login']);
Route::get('/dashboard',[UsersController::class,'dashboard']);
Route::post('/logout',[UsersController::class,'logout']);

Route::get('/checkout/tour/{id}', [TourController::class, 'loadAllTourOrders']);
Route::post('/checkout/tour/{id}/{carID}' ,[TourController::class, 'CreateOrder']);
Route::delete('/checkout/tour/{id}/{carID}' ,[TourController::class, 'deleteOrder']);
Route::patch('/checkout/tour/{id}/{carID}' ,[TourController::class, 'updateOrder']);

Route::get('/tour-cars', [CarController::class, 'tourCars']);

