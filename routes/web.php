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

// Front end routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product-overview');

Auth::routes();


// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{
    Route::get('/', [App\Http\Controllers\admin\HomeController::class, 'index'])->name('home');
    Route::get('products', [App\Http\Controllers\admin\AProductsController::class, 'index'])->name('products');
    Route::get('products/create', [App\Http\Controllers\admin\AProductsController::class, 'create_product'])->name('create_products');

    //POST Routes
    Route::post('/products/store', [App\Http\Controllers\admin\AProductsController::class, 'store_product'])->name('store_products');

});


