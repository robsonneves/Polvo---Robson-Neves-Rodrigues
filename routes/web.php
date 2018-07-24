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
    return view('index');
});

Route::prefix('cadastro')->group(function () {
    
    Route::get('', 'indexCtrl@index')->name('cadastroIndex');

});

Route::prefix('produtos')->group(function () {
    
    Route::get('', 'Produtos\ProdutosCtrl@index')->name('produtosIndex');
    Route::get('cadastro', 'Produtos\ProdutosCtrl@cadastro')->name('produtosCadastro');
    Route::post('save', 'Produtos\ProdutosCtrl@save')->name('produtosSave');
    Route::get('edit/{id}', 'Produtos\ProdutosCtrl@edit')->name('produtosEdit');
    Route::post('update', 'Produtos\ProdutosCtrl@update')->name('produtosUpdate');
    Route::get('deletar/{id}', 'Produtos\ProdutosCtrl@deletar')->name('produtosDeletar');

});

Route::prefix('pedidos')->group(function () {
    
    Route::get('', 'Pedido\PedidoCtrl@index')->name('pedidosIndex');
    Route::get('cadastro', 'Pedido\PedidoCtrl@cadastro')->name('pedidoCadastro');
    Route::post('save', 'Pedido\PedidoCtrl@save')->name('pedidoSave');
    Route::get('edit/{id}', 'Pedido\PedidoCtrl@edit')->name('pedidoEdit');
    Route::post('update', 'Pedido\PedidoCtrl@update')->name('pedidoUpdate');
    Route::get('deletar/{id}', 'Pedido\PedidoCtrl@deletar')->name('pedidoDeletar');

});