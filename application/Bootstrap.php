<?php
/**
 * Class Bootstrap
 */
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

    /**
     * Init the loggers
     *
     * @return object Zend_Log object
     */
    protected function _initLogger()
    {
        // General application logging
        $writer = new Zend_Log_Writer_Stream(
            PROJECT_ROOT . '/data/log/app.log', 'a+'
        );

        $logger = new Zend_Log($writer);
        Zend_Registry::set('logger', $logger);

        return $logger;
    }

    /**
     * Init mail options
     *
     * @return array
     */
    protected function _initMailOptions()
    {
        $mail = Zend_Registry::set('mail', $this->getOption('mail'));
        return $mail;
    }

    /**
     * Init configurations
     *
     * @return Zend_Config
     */
    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions(), true);
        Zend_Registry::set('config', $config);

        return $config;
    }
}
