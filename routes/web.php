<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
#Route::get('/', 'HomeController@home')->name('index');
Route::get('/', 'HomeController@index')->name('log');
Route::get('/home', 'HomeController@home')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'HomeController@dashboard_c')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', 'HomeController@usuarios_c')->name('usuarios');


Route::prefix('/noticia')->group(function () {
    Route::get('/crear', 'ContentController@create_news')->name('crear-noticia');
    Route::post('/guardar-noticia', 'ContentController@save_news')->name('guardar-noticia');
    Route::get('/actualidad/{categoria?}', 'ContentController@show_news')->name('mostrar-noticias');
    Route::get('/actual/{id}/{noticia_name_id}', 'ContentController@read_news')->name('mostrar-noticia');
    #Route::post('/actualidad/filtrado', 'ContentController@show_news_filter')->name('mostrar-noticias-filtradas');
});


Route::get('/modificar/usuario/{id}', 'HomeController@modificar_usuario');
Route::post('/actualizar/usuario/', 'HomeController@actualizar_usuario');

#CREA UN NUEVO USUARIO UTILIZANDO EL FORMULARIO DE EDICION DE USUARIO
Route::get('/crear/usuario', 'HomeController@crear_usuario')->name('nuevo_usuario');
Route::post('/guardar/usuario', 'HomeController@guardar_usuario');

#ADMINISTRACION CRUD DE SLIDERS
Route::prefix('/slider')->group(function () {
    Route::get('/admin', 'FileController@admin_sliders')->name('admin-sliders');
    Route::get('/crear', 'FileController@crear_sliders');
    Route::get('/eliminar/{id}', 'FileController@eliminar_sliders');
    Route::post('/guardar', 'FileController@guardar_slider');
});
