<?php

namespace App\Controllers;

use Illuminate\Database\Query\Builder;

class BlogController
{
  protected $container;
  protected $table;

  public function __construct($container, Builder $table)
  {
    $this->container = $container;
    $this->table = $table;
  }

  public function home($request, $response, $args)
  {
    $posts = $this->table->get();
    //Render blog/index view
    return $this->container->renderer->render($response, 'blog/index.phtml', compact('posts'));
  }
}
