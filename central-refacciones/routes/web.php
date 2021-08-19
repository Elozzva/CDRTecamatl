<?php

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

Route::get('/', 'CarController@index')->name('cars');



Route::get('/import', 'App\Http\Controllers\TestController@import')
->name('car_import');

Route::get('/importProd', 'App\Http\Controllers\ProductController@import')
->name('prod_import');

Route::get('/importCarProd/{idArchivo}', 'App\Http\Controllers\cargarBaleroDobleController@import')
->name('balero_doble_import');

Route::get('/importCajaDirec', 'App\Http\Controllers\cargarCajaDireccionController@import')
->name('caja_direc_import');

// test route name car

Route::get('/testCar/{name}', 'App\Http\Controllers\CarProductController@testCarName');
