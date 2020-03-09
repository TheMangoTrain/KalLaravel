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


Route::post('api/product/create', 'ProductController@store');
Route::get('api/product/edit/{id}', 'ProductController@edit');
Route::post('api/product/update/{id}', 'ProductController@update');
Route::delete('api/product/delete/{id}', 'ProductController@delete');
Route::get('api/products', 'ProductController@index');