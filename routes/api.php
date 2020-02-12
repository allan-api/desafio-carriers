<?php


// Route::apiResource('funcionario', $caminhoFuncionario); //pega todos os métodos
//se descomentar a linha de cima, comentar as abaixo

//funcionarios
Route::prefix('funcionarios')->group(function () {
    Route::get('/',                 'api\FuncionarioController@index'); 
    Route::get('/estatisticas',     'api\FuncionarioController@estatisticas'); 
    Route::get('/{id}',             'api\FuncionarioController@show'); 
    Route::post('/',                'api\FuncionarioController@store');
    Route::put('/{id}',             'api\FuncionarioController@update');
    Route::delete('/{id}',          'api\FuncionarioController@destroy');
});