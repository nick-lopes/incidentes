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
    return redirect()->route('listar_incidentes');
});

// Route::get('/', "ControllerIncidentes@index")->name('listar_incidentes');

Route::get('/incidentes', "ControllerIncidentes@index")->name('listar_incidentes');

Route::get('/incidentes/novo', "ControllerIncidentes@create")->name('form_novo_incidente');
Route::post('/incidentes/novo', "ControllerIncidentes@store")->name('script_criar_incidente');

Route::get('/incidentes/{id}', "ControllerIncidentes@info")->name('form_update_incidente');
Route::put('/incidentes/{id}', "ControllerIncidentes@update")->name('atualizar_incidente');
Route::delete('/incidentes/{id}', "ControllerIncidentes@destroy")->name('excluir_incidente');

