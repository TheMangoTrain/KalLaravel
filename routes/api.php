<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product/{id}', 'ProductController@view');
Route::delete('product/delete/{id}', 'ProductController@delete');
Route::get('products', 'ProductController@index');

Route::get('order/{id}', 'OrderController@view');
Route::delete('order/delete/{id}', 'OrderController@delete');
Route::get('orders', 'OrderController@index');

Route::get('printsheet/{id}', 'PrintSheetController@view');
Route::delete('printsheet/delete/{id}', 'PrintSheetController@delete');
Route::get('printsheets', 'PrintSheetController@index');

Route::get('printsheetitem/{id}', 'PrintSheetItemController@view');
Route::delete('printsheetitem/delete/{id}', 'PrintSheetItemController@delete');
Route::get('printsheetitems', 'PrintSheetItemController@index');

Route::get('db/reseed', 'Controller@reseed');