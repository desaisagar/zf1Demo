<?php

$route = new Zend_Controller_Router_Route(
    '/user/:page', [
        'controller' => 'user',
        'action' => 'index'
    ]
);
$router->addRoute('user/:page', $route);

$route = new Zend_Controller_Router_Route(
    'user/create', [
        'controller' => 'user',
        'action' => 'save'
    ]
);
$router->addRoute('user/create', $route);

$route = new Zend_Controller_Router_Route(
    'user/edit/:id', [
        'controller' => 'user',
        'action' => 'edit'
    ]
);
$router->addRoute('user/edit/:id', $route);

$route = new Zend_Controller_Router_Route(
    'user/delete/:id', [
        'controller' => 'user',
        'action' => 'delete'
    ]
);
$router->addRoute('user/delete/:id', $route);

$route = new Zend_Controller_Router_Route(
    'user/show/:id', [
        'controller' => 'user',
        'action' => 'show'
    ]
);
$router->addRoute('user/show/:id', $route);