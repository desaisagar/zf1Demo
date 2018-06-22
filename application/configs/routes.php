<?php

$userRoutes = [
    'user/:page' => [
        'action' => 'index',
        'controller' => 'user'
    ],
    'user/create' => [
        'action' => 'create',
        'controller' => 'user'
    ],
    'user/edit/:id' => [
        'action' => 'edit',
        'controller' => 'user'
    ],
    'user/delete/:id' => [
        'action' => 'delete',
        'controller' => 'user'
    ],
    'user/show/:id' => [
        'action' => 'show',
        'controller' => 'user'
    ]
];

foreach ($userRoutes as $path => $routeData) {
    $route = new Zend_Controller_Router_Route($path, $routeData);
    $router->addRoute($path, $route);
}
