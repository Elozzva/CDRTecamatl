<?php

use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', 'App\Http\Controllers\searchController@index');
Route::get('/searchByShipowner/{id}', 'App\Http\Controllers\searchController@searchCar')
->name('Shipowner');

Route::get('/searchByCar/{id}', 'App\Http\Controllers\searchController@searchProduct');

Route::get('/searchByYears/{name}', 'App\Http\Controllers\searchController@searchYear')
->name('Years');
//Route::get('/searchBySearch/', 'App\Http\Controllers\searchController@search');

Route::get('/import', 'App\Http\Controllers\TestController@import')
->name('car_import');

Route::get('/importProd', 'App\Http\Controllers\ProductController@import')
->name('prod_import');

Route::get('/importCarProd/{idArchivo}', 'App\Http\Controllers\CarProductController@import')
->name('car_prod_import');

Route::get('/importCajaDirec', 'App\Http\Controllers\cargarCajaDireccionController@import')
->name('caja_direc_import');

// test route name car

Route::get('/testCar/{name}', 'App\Http\Controllers\CarProductController@testCarName');
