<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::namespace('teste')->group(function(){   

    Route::group(['prefix' => 'aluno'], function(){
        Route::post('/adicionar', 'AlunoController@adicionar');
        Route::get('/listar', 'AlunoController@listar');
        Route::get('/listar/{id}', 'AlunoController@selecionar');
        Route::put('/atualizar/{id}', 'AlunoController@atualizar');
    });

    Route::group(['prefix' => 'turma'], function(){
        Route::post('/adicionar', 'TurmaController@adicionar');
        Route::get('/listar', 'TurmaController@listar');
        Route::get('/listar/{id}', 'TurmaController@selecionar');
        Route::put('/atualizar/{id}', 'TurmaController@atualizar');
    });

    Route::group(['prefix' => 'escola'], function(){
        Route::post('/adicionar', 'EscolaController@adicionar');
        Route::get('/listar', 'EscolaController@listar');
        Route::get('/listar/{id}', 'EscolaController@selecionar');
        Route::put('/atualizar/{id}', 'EscolaController@atualizar');
    });

});