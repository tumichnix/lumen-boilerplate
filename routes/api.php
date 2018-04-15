<?php

$router->group([
    'prefix' => 'api',
    'namespace' => 'Api',
    'middleware' => ['throttle:60,1'],
], function () use ($router) {

    $router->get('/ping', ['as' => 'api.ping', 'uses' => 'MiscController@getPing']);

});
