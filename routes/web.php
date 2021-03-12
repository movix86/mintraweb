<?php

use Illuminate\Support\Facades\Route;
//use App\Models\Slider;

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

/*
Route::get('/', function () {
    return view('pagina');
});
*/

Route::get('/', 'HomeController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => 'home'], function () {
    Route::get('index', 'HomeController@index');
});

Route::get('/pruebaListar', 'SliderController@index');

Route::get('/slider', 'SliderController@index2');

Route::get('/eliminarSlider1/{id}', 'SliderController@destroy');

Route::get('/eliminarSlider', function() {
	$data['total'] = 20;
	echo "HIHI";

	return view('file', $data);
});

Route::get('/insertSlider', function () {
	/*Insertar nuevo slider*/	
	$insertSlider = \DB::table('slider')->insert([
		//'id' => '2',
		'descripcion' => '$request->etiquetaAlt',
		'direccion' => '$image_name',
	]);
});

Route::get('/test', 'SliderController@indexSlider');

Route::post('file', 'SliderController@insertarSlider');

Route::post('slider-update', 'SliderController@update');

Route::get('/admin-cumpleanios', 'AdminCumpleaniosController@index');

Route::post('administradoresCumpleanios', 'AdminCumpleaniosController@create');

Route::get('/eliminarAdminCumple/{id}', 'AdminCumpleaniosController@destroy');

Route::post('admin-cumple-update', 'AdminCumpleaniosController@update');