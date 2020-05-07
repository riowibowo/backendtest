<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/stocks', 'StockController@index');
$router->post('stocks/insert', 'StockController@store');
$router->patch('stocks/update', 'StockController@update');

$router->get('/rents', 'RentController@index');
