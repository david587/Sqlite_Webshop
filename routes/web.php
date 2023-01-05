<?php

use App\Http\Controllers\ProductController;
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

Route::get("/", "MainController@index");

Route::get('product', "ProductController@index");

Route::get('products/create', [ProductController::class,"create"]);

Route::post('products', [ProductController::class,"store"]);

Route::get('products/{product}', [ProductController::class,"show"]);

Route::get('products/{product}/edit', [ProductController::class,"edit"]);

Route::match(["put","patch"],'products/{product}', [ProductController::class,"update"]);

Route::get('products/{product}', [ProductController::class,"destroy]"]);


