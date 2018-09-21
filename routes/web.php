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
Route::put('/pdv/update', 'PuntoVentaController@updateAll')->name('pdv.updateall');
Route::get('/pdv/allpdv', 'PuntoVentaController@getAllPdvJ')->name('pdv.allpdv');
Route::get('/pdv/{id}', 'PuntoVentaController@show')->name('pdv.show');
Route::get('/pdv/getpdv/{id}', 'PuntoVentaController@getPdvJ')->name('pdv.getpdv');
Route::get('/pdvs/pages', 'PuntoVentaController@getAllPdvPagesJ')->name('pdv.pages');
//metodos para las busquedas
Route::post('/pdvs/searchByStore', 'PuntoVentaController@searchByStoreNameJ')->name('pdv.searchbystore');
Route::post('/pdvs/searchByFilter', 'PuntoVentaController@searchByFilteredJ')->name('pdv.searchbyfilter');
//////
Route::post('/comment', 'CommentController@create')->name('comment.create');
Route::get('/comment/getComents/{id}', 'CommentController@showJ')->name('comment.show');
Route::get('/status/getStatus', 'PdvStatusAdquisicionController@getAllStatusJ')->name('status.getstatus');
Route::get('/status/getStatusFilter', 'PdvStatusAdquisicionController@getAllStatusFilterJ')->name('status.getstatusfilter');
Route::get('/statuscontrato/getstatuscontrato', 'PdvStatusContratoController@getAllStatusContratoJ')->name('statucontrato.getstatuscontrato');
Route::get('/statucontrato/getstatuscontratofilter', 'PdvStatusContratoController@getAllStatusContratoFilterJ')->name('statucontrato.getstatuscontratofilter');
Route::get('/plaza/getplazas', 'PlazaController@getAllPlazasJ')->name('plaza.getplazas');
Route::get('/region/getregions', 'RegionController@getAllRegionsJ')->name('region.getregions');
Route::get('/subregion/getsubregions', 'SubregionController@getAllSubregionsJ')->name('subregion.getubregions');
Route::get('/tienda/gettiendas', 'TiendaController@getAllStoresJ')->name('tienda.gettiendas');
Route::put('/tienda/update', 'TiendaController@update')->name('tienda.update');
Route::get('test', 'TestController@index');
Route::get('/test/pages', 'TestController@getAllPdvPages')->name('test.pages');

//Route::resource('/test2','TestController2');

Route::get('/test2','TestController2@getPdv')->name('test2.getpdv');
Route::post('/test2','TestController2@savePdv')->name('test2.savepdv');
//Route::delete();