<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BankController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\DiscountController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/user', [AuthController::class, 'profile']);
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    Route::get('/shop', [AuthController::class, 'shop']);
    Route::get('/bank', [BankController::class, 'index']);

    // Route::get('/customer', [CustomerController::class, 'index']);
    Route::apiResource('/customer', CustomerController::class);
    Route::apiResource('/payment', PaymentController::class);
    Route::apiResource('/service', ServiceController::class);
    Route::apiResource('/discount', DiscountController::class);
    Route::apiResource('/employee', EmployeeController::class);
    Route::apiResource('/order', OrderController::class);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
