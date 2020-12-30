<?php

use Illuminate\Support\Facades\Route;

Route::get('/','vendas\VendasController@index');

/* Clientes */

Route::get('/clientes','clientes\clienteController@index');

Route::get('/cliente_cadastro','clientes\clienteController@retornaCadastroCliente');

Route::post('/cad_cliente','clientes\clienteController@create');

Route::get('/edit/{id}','clientes\clienteController@edit');

Route::post('/cliente_atual','clientes\clienteController@update');

Route::get('/delete_cliente/{id}','clientes\clienteController@delete');

Route::post('/novocliente','clientes\clienteController@clientevenda');

Route::post('/novoatualcliente','clientes\clienteController@clientevendaatual');

/* Produtos e categorias */

Route::post('/categoria_cadastro','produtos\produtoController@storeCategoria');

Route::post('/categoria_atual','produtos\produtoController@updateCategoria');

Route::get('/categoria-edit/{id}','produtos\produtoController@editcategoria');

Route::get('/categoria_delete/{id}','produtos\produtoController@deletecategoria');

Route::get('/produtos','produtos\produtoController@index');

Route::get('/produto_cadastro','produtos\produtoController@retornaCadastroProduto');

Route::post('/produto_cad','produtos\produtoController@create');

Route::post('/produto_atual','produtos\produtoController@update');

Route::get('/produto-edit/{id}','produtos\produtoController@edit');

Route::get('/produto_delete/{id}','produtos\produtoController@destroy');

Route::get('/produto_edit_m/{id}','produtos\produtoController@edit2');

Route::get('/produto_delete_m/{id}','produtos\produtoController@destroy2');

Auth::routes();

/* Login e serviços */

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/loginuser','Auth\LogController@login')->name('loginuser');

Route::post('/registeruser','initController@create');

Route::post('/logar','Auth\LogController@authenticate');

Route::get('/Exportproduto','Apis\ApiController@justPDF')->name('produtos.pdf');

Route::get('/Prod/{id}','Apis\ApiController@infoproduto');

/* Vendas */

Route::get('/vendas','vendas\VendasController@index');

Route::post('/busca','vendas\VendasController@buscaprodutos');

Route::post('/busca2','vendas\VendasController@busca2');

Route::post('/buscacliente','vendas\VendasController@buscacliente');

Route::post('/venda-checkout','vendas\VendasController@checkoutboleto');

Route::post('/venda','vendas\VendasController@gerarvenda');

/*User*/

Route::get('/User','UserController@getuser');

Route::post("/Upduser",'UserController@upduser');

