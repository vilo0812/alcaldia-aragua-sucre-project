<?php

use Illuminate\Support\Facades\Route;

Route::get('/gadgetPDF','Api\GadgetsController@gadgetPDF');
Route::get('/', function () {
    return view('welcome');
});
