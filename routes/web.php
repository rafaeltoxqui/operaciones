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
    return view('exp_operaciones.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pVentaGrid', 'PuntosVentaController@showGridView')->name('grid');
Route::get('/pdvData', 'PuntosVentaController@pdvData')->name('datapdv');

Route::get('test', 'TestController@index');