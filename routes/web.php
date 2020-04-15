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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['middleware' => 'auth', 'prefix' => 'ponto'], function () {
    Route::get('/', 'PontoController@index');
    Route::get('/create', 'PontoController@create');
    Route::post('/store', 'PontoController@store')->name('ponto.store');
    Route::get('/edit', 'PontoController@edit');
    Route::post('/update', 'PontoController@update');
    Route::delete('/destroy', 'PontoController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'aluno'], function () {
    Route::get('/', 'AlunoController@index');
    Route::get('/list', 'AlunoController@list');
    Route::get('/create', 'AlunoController@create');
    Route::post('/store', 'AlunoController@store');
    Route::get('/edit/{id}', 'AlunoController@edit');
    Route::post('/update/{id}', 'AlunoController@update');
    Route::delete('/destroy/{id}', 'AlunoController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'personal'], function () {
    Route::get('/', 'PersonalController@index');
    Route::get('/list', 'PersonalController@list');
    Route::get('/create', 'PersonalController@create');
    Route::post('/store', 'PersonalController@store');
    Route::get('/edit/{id}', 'PersonalController@edit');
    Route::post('/update/{id}', 'PersonalController@update');
    Route::delete('/destroy/{id}', 'PersonalController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'avaliacao'], function () {
    Route::get('/', 'AvaliacaoController@index');
    Route::get('/list', 'AvaliacaoController@list');
    Route::get('/create', 'AvaliacaoController@create');
    Route::post('/store', 'AvaliacaoController@store');
    Route::get('/edit/{id}', 'AvaliacaoController@edit');
    Route::post('/update/{id}', 'AvaliacaoController@update');
    Route::delete('/destroy/{id}', 'AvaliacaoController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'relatorio'], function () {
    Route::get('/', 'RelatorioController@index');
    Route::get('/gerar', 'RelatorioController@gerar');
});
