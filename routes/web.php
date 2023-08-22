<?php

use App\Models\listings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('web');
});

Route::post('/register',[UserController::class, 'register']
);

//Route::resource('products',ProductsController::class);

Route::controller(ProductsController::class)->group(function(){

    Route::get('products', 'index')->name('products.index');

    Route::post('product', 'store')->name('products.store');

    Route::get('products/create', 'create')->name('products.create');

    Route::get('products/{product}', 'show')->name('products.show');

    Route::put('products/{product}', 'update')->name('products.update');

    Route::delete('products/{product}', 'destroy')->name('products.destroy');

    Route::get('products/{product}/edit', 'edit')->name('products.edit');

});