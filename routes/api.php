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

Route::post('/search-product', 'Front\PostController@search')->name('search-product');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
