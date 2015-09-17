<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('/auth', 'Auth\AuthController');
Route::get('/', 'DashboardController@index');

Route::group(['middleware' => 'auth'], function()
{

    Route::group(['prefix' => 'categorias'], function()
    {
        Route::get('',                  ['as' => 'categoria.index',     'uses' => 'CategoriaController@index']);
        Route::post('salvar',            ['as' => 'categoria.store',     'uses' => 'CategoriaController@store']);
        Route::get('editar/{id}',      ['as' => 'categoria.edit',      'uses' => 'CategoriaController@edit']);
        Route::post('atualizar/{id}',   ['as' => 'categoria.update',    'uses' => 'CategoriaController@update']);
        Route::get('remover/{id}',     ['as' => 'categoria.destroy',   'uses' => 'CategoriaController@destroy']);
    });

});

