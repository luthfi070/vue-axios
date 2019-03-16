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

$router->post('/guru', 'gurucontroller@create');
$router->get('/guru', 'gurucontroller@read');
$router->post('/guru/{id}', 'gurucontroller@update');
$router->delete('/guru/{id}', 'gurucontroller@delete');
$router->get('/guru/{id}', 'gurucontroller@detail');
