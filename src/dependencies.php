<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Service factory for the ORM
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

// Service Controllers
$container['\BlogController'] = function ($container) {
    $table = $container->get('db')->table('posts');
    return new \App\Controllers\BlogController($container, $table);
};
$container['\PostController'] = function ($container) {
    $table = $container->get('db')->table('posts');
    return new \App\Controllers\PostController($container, $table);
};
$container['\AuthController'] = function ($container) {
    $table = $container->get('db')->table('users');
    return new \App\Controllers\AuthController($container, $table);
};

