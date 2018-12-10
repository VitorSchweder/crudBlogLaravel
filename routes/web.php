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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware(['auth'])->group(function () {
    /**
     * Categorias
     */
    Route::get('/categorias', 'CategoriaController@index')->name('categoria.index');
    Route::get('/categoria/incluir', 'CategoriaController@incluir')->name('categoria.incluir');
    Route::get('/categoria/{id}/alterar', 'CategoriaController@alterar')->where('id', '[0-9]+')->name('categoria.alterar');
    Route::get('/categoria/{id}/visualizar', 'CategoriaController@visualizar')->where('id', '[0-9]+')->name('categoria.visualizar');
    Route::post('/categoria/incluir', 'CategoriaController@salvar')->name('categoria.salvar');
    Route::delete('/categoria/{id}/excluir', 'CategoriaController@excluir')->where('id', '[0-9]+')->name('categoria.excluir');
    Route::patch('/categoria/{id}/alterar', 'CategoriaController@atualizar')->where('id', '[0-9]+')->name('categoria.atualizar');

    /**
     * Posts
     */
    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/post/incluir', 'PostController@incluir')->name('post.incluir');
    Route::get('/post/{id}/alterar', 'PostController@alterar')->where('id', '[0-9]+')->name('post.alterar');
    Route::get('/post/{id}/visualizar', 'PostController@visualizar')->where('id', '[0-9]+')->name('post.visualizar');
    Route::post('/post/incluir', 'PostController@salvar')->name('post.salvar');
    Route::delete('/post/{id}/excluir', 'PostController@excluir')->where('id', '[0-9]+')->name('post.excluir');
    Route::patch('/post/{id}/alterar', 'PostController@atualizar')->where('id', '[0-9]+')->name('post.atualizar');
    Route::post('/posts', 'PostController@pesquisar')->name('post.pesquisar');
});

Auth::routes(['login']);
