<?php

namespace App\Controllers;

use Illuminate\Database\Query\Builder;

class PostController
{
    protected $container;
    protected $table;

    public function __construct($container, Builder $table)
    {
        $this->container = $container;
        $this->table = $table;
    }

    public function index($request, $response, $args)
    {
        //
    }

    public function create($request, $response, $args)
    {
        //
    }

    public function store($request, $response, $args)
    {
        //
    }

    public function edit($request, $response, $args)
    {
        //
    }

    public function update($request, $response, $args)
    {
        //
    }

    public function destroy($request, $response, $args)
    {
        //
    }
}
