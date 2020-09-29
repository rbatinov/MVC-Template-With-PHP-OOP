<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('VIEW', ROOT . 'app' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODEL', ROOT . 'app' . DIRECTORY_SEPARATOR . 'model'. DIRECTORY_SEPARATOR);
define('DATA', ROOT . 'app' . DIRECTORY_SEPARATOR . 'data'. DIRECTORY_SEPARATOR);
define('CORE', ROOT . 'app' . DIRECTORY_SEPARATOR . 'core'. DIRECTORY_SEPARATOR);
define('CONTROLLER', ROOT . 'app' . DIRECTORY_SEPARATOR . 'controller'. DIRECTORY_SEPARATOR);
define('HELPER', ROOT . 'app' . DIRECTORY_SEPARATOR . 'Helper'. DIRECTORY_SEPARATOR);
define('CONFIG', ROOT . 'app' . DIRECTORY_SEPARATOR . 'config'. DIRECTORY_SEPARATOR);

$modules = [ROOT,APP,CORE,CONTROLLER,DATA,HELPER];

require_once '../app/config/config.php';


set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));
spl_autoload_register('spl_autoload', false);

new Application;

