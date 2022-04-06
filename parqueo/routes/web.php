<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->group(['prefix' => 'api'], function () use ($router) {

    //RUTAS PARA TIPOS DE VEHICULO
    $router->get('tipos',  ['uses' => 'tiposVehiculoController@showAllTipos']);
  
    $router->get('tipos/{id}', ['uses' => 'tiposVehiculoController@showOneTipo']);
  
    $router->post('tipos', ['uses' => 'tiposVehiculoController@create']);
  
    $router->delete('tipos/{id}', ['uses' => 'tiposVehiculoController@delete']);
  
    $router->put('tipos/{id}', ['uses' => 'tiposVehiculoController@update']);

    //RUTAS PARA VEHICULOS

    $router->get('vehiculos',  ['uses' => 'vehiculoController@showAllVehiculos']);
  
    $router->get('vehiculos/{id}', ['uses' => 'vehiculoController@showOneVehiculo']);
  
    $router->post('vehiculos', ['uses' => 'vehiculoController@create']);
  
    $router->delete('vehiculos/{id}', ['uses' => 'vehiculoController@delete']);
  
    $router->put('vehiculos/{id}', ['uses' => 'vehiculoController@update']);

    //RUTAS PARA ESTANCIAS

    $router->get('estancias',  ['uses' => 'estanciasController@showAllEstancias']);
  
    $router->get('estancias/{id}', ['uses' => 'estanciasController@showOneEstancia']);
  
    $router->post('estancias', ['uses' => 'estanciasController@create']);
  
    $router->delete('estancias/{id}', ['uses' => 'estanciasController@delete']);
  
    $router->put('estancias/{id}', ['uses' => 'estanciasController@update']);

    //RUTAS PARA PAGOS ACTUAL

    $router->get('pagos',  ['uses' => 'pagosActualController@showAllPagos']);
  
    $router->get('pagos/{id}', ['uses' => 'pagosActualController@showOnePago']);
  
    $router->post('pagos', ['uses' => 'pagosActualController@create']);
  
    $router->delete('pagos/{id}', ['uses' => 'pagosActualController@delete']);
  
    $router->put('pagos/{id}', ['uses' => 'pagosActualController@update']);
  });