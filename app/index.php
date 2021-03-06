<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->get('/creational/abstract-factory', 'app/DesignPatterns/Creational/AbstractFactory/index.php');
    $r->get('/creational/builder', 'app/DesignPatterns/Creational/Builder/index.php');
    $r->get('/creational/factory-method', 'app/DesignPatterns/Creational/FactoryMethod/index.php');

    $r->get('/structural/adapter', 'app/DesignPatterns/Structural/Adapter/index.php');
    $r->get('/structural/bridge', 'app/DesignPatterns/Structural/Bridge/index.php');
    $r->get('/structural/proxy', 'app/DesignPatterns/Structural/Proxy/index.php');

    $r->get('/behavioral/iterator', 'app/DesignPatterns/Behavioral/Iterator/index.php');
    $r->get('/behavioral/observer', 'app/DesignPatterns/Behavioral/Observer/index.php');
    $r->get('/behavioral/strategy', 'app/DesignPatterns/Behavioral/Strategy/index.php');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        die('404 Not Found');

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        die('405 Method Not Allowed');

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
//        $vars = $routeInfo[2];
        // ... call $handler with $vars
        require $handler;
        break;
}
