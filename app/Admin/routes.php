<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    // Admin::registerHelpersRoutes();

// 默认的路由前缀是`/admin/helpers/`，可以修改

    // Admin::registerHelpersRoutes(['prefix' => 'your-prefix']);

});
