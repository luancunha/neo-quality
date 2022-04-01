<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios', 'UsuarioController');

Route::resource('internacoes', 'InternacaoController');

Route::resource('dados_internacoes', 'DadosInternacaoController');

Route::get('/internacoes/{status}/{id}', 'InternacaoController@status')->name('internacoes.status');
