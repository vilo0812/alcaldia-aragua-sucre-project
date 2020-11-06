<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function ($router) {
    	Route::post('login', 'Auth\AuthController@login');
});
Route::resource('mayors', 'Api\MayorsController');
Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {
	Route::get('me', 'Auth\AuthController@me');
	Route::post('refresh', 'Auth\AuthController@refresh');
	Route::post('logout', 'Auth\AuthController@logout');
});
