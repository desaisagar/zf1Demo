<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     * Init the doctype.
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('HTML5');
    }

    /**
     * Application routing
     */
    protected function _initRoutes()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        include APPLICATION_PATH . "/configs/routes.php";
    }
}

