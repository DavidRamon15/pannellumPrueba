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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::name('tours_path')->get('/tours' ,'toursController@index');
Route::name('create_tour_path')->get('/tour/create','toursController@create');


Route::name('store_tour_path')->post('/tours','toursController@store');

Route::name("delete_tour_path")->delete("/tour/{tour}","toursController@delete");
Route::name('update_tour_path')->put('/tours/{tour}' ,'toursController@update');

Route::name('tour_path')->get('/tour/{tour}','toursController@show');

Route::name('modificar_tour_path')->get('/tours/{tour}/modificar','toursController@edit');

Route::name('datos_tour')->get('datos_tour/{tour}' ,'toursController@get_datos');

//IMAGENES 

Route::name('imagenes_path')->get('/escenas/{tour}' ,'imagenesController@index');

Route::name('create_imagenes_path')->get('/escenas/create/{tour}','imagenesController@create');
Route::name('store_imagen_path')->post('/escenas/{tour}','imagenesController@store');
Route::name("delete_imagen_path")->delete("/escenas/{id}/{id_tour}","imagenesController@delete");


Route::name('modificar_imagen_path')->get('/escenas/{id_tour}/{id_escena}/modificar','imagenesController@edit');

Route::name('modificar_imagenPitchYaw_path')->get('/escenas/{id_tour}/{id_escena}/modificarPitchYaw','imagenesController@editPitchYaw');

Route::name('update_imagen_path')->put('/escenas/update/{tour}' ,'imagenesController@update');

Route::name('update_imagenPitchYaw_path')->put('/escenas/update/{tour}/modificarPitchYaw' ,'imagenesController@updatePitchYaw');

//Hotspots

Route::name('hotspots_path')->get('/hotspots/{escena}' ,'hotspotsController@index');

Route::name('create_hotspot_path')->get('/hotspots/create/{escena}','hotspotsController@create');
Route::name('getData_hotspot_path')->post('/hotspots/createPitchYaw/{escena}','hotspotsController@getData');
Route::name('store_hotspot_path')->post('/hotspots','hotspotsController@store');

Route::name("delete_hotspot_path")->delete("/hotspots/{id}/{id_escena}/delete","hotspotsController@delete");

Route::name('modificar_hotspot_path')->get('/hotspots/{id_escena}/{id_hotspots}/modificar','hotspotsController@edit');

Route::name('modificar_hotspotPitchYaw_path')->get('/hotspots/{id_escena}/{id_hotspots}/modificarPitchYaw','hotspotsController@editPitchYaw');

Route::name('update_hotspot_path')->put('/hotspots/update/{tour}' ,'hotspotsController@update');
Route::name('update_hotspotPitchYaw_path')->put('/hotspots/update/{tour}/modificarPitchYaw' ,'hotspotsController@updatePitchYaw');
