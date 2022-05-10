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

$router->get('/index', [
    'as' => 'showPokenea', 'uses' => 'PokeneaController@showPokenea'
]);

$router->get('/pokecontent', [
    'as' => 'showMultimedia', 'uses' => 'PokeneaController@showMultimedia'
]);
