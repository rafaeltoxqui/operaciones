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
Route::get('/pdvs', 'PuntoVentaController@index')->name('pdvs');
Route::post('/pdv', 'PuntoVentaController@update')->name('pdv.update');
Route::get('/pdv/allpdv', 'PuntoVentaController@getAllPdv')->name('pdv.allpdv');
Route::get('/pdv/{id}', 'PuntoVentaController@show')->name('pdv.show');
Route::get('/pdv/getpdv/{id}', 'PuntoVentaController@getPdv')->name('pdv.getpdv');

Route::post('/comment', 'CommentController@create')->name('comment.create');


Route::get('test', 'TestController@index');

//Route::resource('/test2','TestController2');

Route::get('/test2','TestController2@getPdv')->name('test2.getpdv');
Route::post('/test2','TestController2@savePdv')->name('test2.savepdv');
//Route::delete();