<?php
// Routes

$app->get('/post', '\PostController:index');

$app->get('/login', '\AuthController:login');
$app->post('/login', '\AuthController:validate');
$app->get('/logout', '\AuthController:logout');

$app->get('/', '\BlogController:home');

