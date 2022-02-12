<?php

use App\Models\Product;
use App\Http\Controllers\ProductsApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get all products
Route::get('/products', [ProductsApiController::class, 'index']);

// Get all products for a specific product
Route::get('/products_by_category/{category_id}', [ProductsApiController::class, 'filterProductsByCategory']);


//  Create a new Product
Route::post('/product', [ProductsApiController::class, 'store']);

// Update a product information
Route::put('/product/{product}', [ProductsApiController::class, 'update']);

// Delete a product informations
Route::delete('/product/{product}', [ProductsApiController::class, 'destroy']);