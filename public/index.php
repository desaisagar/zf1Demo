<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

define('PROJECT_ROOT', realpath(__DIR__ . '/../'));

/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'Zend/Config/Ini.php';
$globalConfig = new Zend_Config_Ini(
    APPLICATION_PATH . '/configs/application.ini',
    APPLICATION_ENV,
    array ('allowModifications' => true)
);

$constants = new Zend_Config_Ini(APPLICATION_PATH . '/configs/constants.ini');
$globalConfig->merge($constants);

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    $globalConfig
);
$application->bootstrap()
            ->run();