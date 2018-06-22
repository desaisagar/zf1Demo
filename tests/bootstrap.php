<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

define('PROJECT_ROOT', realpath(__DIR__ . '/../'));

require_once 'Zend/Loader/Autoloader.php';
require_once 'Zend/Config/Ini.php';
$globalConfig = new Zend_Config_Ini(
    APPLICATION_PATH . '/configs/application.ini',
    APPLICATION_ENV,
    array ('allowModifications' => true)
);

$constants = new Zend_Config_Ini(APPLICATION_PATH . '/configs/constants.ini');
$globalConfig->merge($constants);

Zend_Loader_Autoloader::getInstance();
$application = new Zend_Application(
    APPLICATION_ENV,
    $globalConfig
);
$option = $application->getOptions();
$application->setOptions($option);
$application->bootstrap();
