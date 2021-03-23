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

Route::get('/', 'HomeController@home')->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'HomeController@dashboard_c')->name('dashboard');


Route::prefix('noticia')->group(function () {
    Route::get('/crear', 'HomeController@crear_noticia');
    Route::get('/actualidad', 'HomeController@mostrar_noticia');
});


Route::get('/modificar/usuario/{id}', 'HomeController@modificar_usuario');
Route::post('/actualizar/usuario/', 'HomeController@actualizar_usuario');

#CREA UN NUEVO USUARIO UTILIZANDO EL FORMULARIO DE EDICION DE USUARIO
Route::get('/crear/usuario', 'HomeController@crear_usuario')->name('nuevo_usuario');
Route::post('/guardar/usuario', 'HomeController@guardar_usuario');

#ADMINISTRACION CRUD DE SLIDERS
Route::prefix('/slider')->group(function () {
    Route::get('/admin', 'FileController@admin_sliders');
    Route::get('/crear', 'FileController@crear_sliders');
    Route::get('/eliminar/{id}', 'FileController@eliminar_sliders');
    Route::post('/guardar', 'FileController@guardar_slider');
});
