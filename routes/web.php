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
    Route::post('/store', 'PontoController@store');
    Route::get('/edit', 'PontoController@edit');
    Route::post('/update', 'PontoController@update');
    Route::delete('/destroy', 'PontoController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'aluno'], function () {
    Route::get('/', 'AlunoController@index');
    Route::get('/create', 'AlunoController@create');
    Route::post('/store', 'AlunoController@store');
    Route::get('/edit', 'AlunoController@edit');
    Route::post('/update', 'AlunoController@update');
    Route::delete('/destroy', 'AlunoController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'personal'], function () {
    Route::get('/', 'PersonalController@index');
    Route::get('/create', 'PersonalController@create');
    Route::post('/store', 'PersonalController@store');
    Route::get('/edit', 'PersonalController@edit');
    Route::post('/update', 'PersonalController@update');
    Route::delete('/destroy', 'PersonalController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'avaliacao'], function () {
    Route::get('/', 'AvaliacaoController@index');
    Route::get('/create', 'AvaliacaoController@create');
    Route::post('/store', 'AvaliacaoController@store');
    Route::get('/edit', 'AvaliacaoController@edit');
    Route::post('/update', 'AvaliacaoController@update');
    Route::delete('/destroy', 'AvaliacaoController@destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'relatorio'], function () {
    Route::get('/', 'RelatorioController@index');
    Route::get('/gerar', 'RelatorioController@gerar');
});
