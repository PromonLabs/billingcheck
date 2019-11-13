<?php

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

Route::get('/', function () {
    return view('noc');
});

Route::get('/noc', function () {
    return view('noc');
});

Route::get('/comverse-check', function () {
    return view('comverse-check');
});

Route::get('/comverse/ADSL_slideshowBU', function () {
    return view('comverse/ADSL_slideshowBU');
});

