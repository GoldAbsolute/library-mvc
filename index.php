<?php

require __DIR__ . '/vendor/autoload.php';
require 'Application/router.php';
require 'Application/Http/Request.php';
require 'Application/controllers/Library_controller.php';

use Router\Router;
use Request\Request;
use Controllers\library_controller;

$request = new Request();
$controller = new library_controller($request->getParams());
$router = new Router($request,  $controller);
try {
    $router->start();
} catch (Exception $e) {

}
