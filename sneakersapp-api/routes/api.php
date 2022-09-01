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

Route::get('products', [App\Http\Controllers\ProductController::class, 'products']);

Route::post('save_product', [App\Http\Controllers\ProductController::class, 'saveProduct']);

Route::delete('delete_product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
