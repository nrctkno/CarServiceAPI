<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->group(['prefix' => 'owners'], function () use ($router) {
        $router->get('/', ['as' => 'owner_get', 'uses' => 'Owner\Find']);
        $router->post('/', ['as' => 'owner_post', 'uses' => 'Owner\Create']);
        $router->get('/{id}', ['as' => 'owner_get_one', 'uses' => 'Owner\Get']);
    });
    $router->group(['prefix' => 'cars'], function () use ($router) {
        $router->get('/', ['as' => 'car_get', 'uses' => 'Car\Find']);
        $router->post('/', ['as' => 'car_post', 'uses' => 'Car\Create']);

        $router->group(['prefix' => '{id}'], function () use ($router) {
            $router->put('/', ['as' => 'car_put', 'uses' => 'Car\Update']);
            $router->delete('/', ['as' => 'car_delete', 'uses' => 'Car\Delete']);

            $router->group(['prefix' => 'services'], function () use ($router) {
                $router->get('/', ['as' => 'service_get', 'uses' => 'CarService\Find']);
                $router->post('/', ['as' => 'service_post', 'uses' => 'CarService\Create']);
            });
        });
    });

    $router->get('/', function () use ($router) {
        return 'api/v1 home';
    });
});

$router->get('/', function () use ($router) {
    return 'go to /api/v1';
});
