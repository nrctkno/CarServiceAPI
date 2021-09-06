<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group(['prefix' => 'owners'], function () use ($router) {
        $router->get('/', ['as' => 'owner_get', 'uses' => 'Owner\Find']);
        $router->post('/', ['as' => 'owner_post', 'uses' => 'Owner\Create']);
        $router->get('/{id}', ['as' => 'owner_get_one', 'uses' => 'Owner\Get']);
    });
    $router->get('/', function () use ($router) {
        return 'api/v1';
    });
});

$router->get('/', function () use ($router) {
    return 'go to /api/v1';
});
