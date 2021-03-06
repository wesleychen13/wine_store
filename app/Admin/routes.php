<?php

use Illuminate\Routing\Router;
use Tests\Controllers\FileController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('users', 'UserController')->names('admin.users')->only('index', 'show');
    $router->resource('settings', 'SettingController')->names('admin.settings');

    $router->resource('categories', 'CategoryController')->names('admin.categories');
    $router->resource('products', 'ProductController')->names('admin.products');

    $router->post('orders/{order}/ship', 'OrderController@ship')->name('admin.orders.ship');
    $router->resource('orders', 'OrderController')->names('admin.orders')->only('index', 'show');
    $router->resource('rewards', 'RewardController')->names('admin.rewards')->only('index', 'show');
    $router->resource('rebates', 'RebateController')->names('admin.rebates')->only('index', 'show');

    $router->resource('notices','NoticeController')->names('admin.notices');
    $router->resource('banners','BannerController')->names('admin.banners');

});
