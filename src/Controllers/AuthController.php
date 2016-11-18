<?php

namespace App\Controllers;

use Illuminate\Database\Query\Builder;

class AuthController
{
    protected $container;
    protected $table;

    public function __construct($container, Builder $table)
    {
        $this->container = $container;
        $this->table = $table;
    }

    public function login($request, $response, $args)
    {
        return $this->container->renderer->render($response, 'auth/login.phtml');
    }

    public function validate($request, $response, $args)
    {
        var_dump($args);
        $userData = $this->table->where('username', '=', 'jfreites')
            ->where('password', '=', 'secret')
            ->get();

        var_dump($userData);
    }

    public function register()
    {

    }

    public function logout()
    {

    }
}
