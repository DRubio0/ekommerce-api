<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\CategoriesApiController;
use App\Http\Controllers\OrdersApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function() 
{
    // User
    Route::get('/user', function (Request $request) 
    {
        return $request->user();
    });
    Route::post('/user', [ApiAuthController::class, 'updateImage']);
    Route::patch('/user', [ApiAuthController::class, 'update']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);

    
    // Products
    Route::get('/products', [ProductsApiController::class, 'index']);
    Route::get('/product/{product}', [ProductsApiController::class, 'show']);

    // Categories
    Route::get('/categories',[CategoriesApiController::class,'index']);

    // Orders
    Route::get('/orders', [OrdersApiController::class, 'index']);
    Route::post('/orders', [OrdersApiController::class, 'store']);
});

//Users Developer
Route::get('/users',[UserApiController::class,'index']);

// Authentication
Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);