<?php

$route = new Zend_Controller_Router_Route(
    '/', [
        'controller' => 'user',
        'action' => 'index'
    ]
);
$router->addRoute('user', $route);

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