<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('categories', 'App\Http\Controllers\Api\CategoryController@index');
Route::post('categories', 'App\Http\Controllers\Api\CategoryController@store');
Route::put('categories/{id}', 'App\Http\Controllers\Api\CategoryController@update');
Route::delete('categories/{id}', 'App\Http\Controllers\Api\CategoryController@delete');*/


/*Route::get('categories/{id}/products', 'App\Http\Controllers\Api\CategoryController@products');
Route::resource('categories', App\Http\Controllers\Api\CategoryController::class);
Route::resource('products', App\Http\Controllers\Api\ProductController::class);*/

Route::post('auth','App\Http\Controllers\Auth\AuthApiController@authenticate');
Route::post('auth-refresh','App\Http\Controllers\Auth\AuthApiController@refreshToken');
Route::get('me','App\Http\Controllers\Auth\AuthApiController@getAuthenticatedUser');


Route::group([
    'prefix' => 'v1',
    //'namespace'   => 'Api\v1',
    //'middleware'  => 'jwt.auth'
],
    function () {
    Route::get('categories/{id}/products', 'App\Http\Controllers\Api\CategoryController@products');
    Route::resource('categories', App\Http\Controllers\Api\v1\CategoryController::class);
    Route::resource('products', App\Http\Controllers\Api\v1\ProductController::class);
});

