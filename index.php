<?php
declare(strict_types = 1);
require_once ('app/core/settings.php');
if (GlobalSettings::ENVIRONMENT == 'DEV')
    require_once ('app/core/dev.php');
else if (GlobalSettings::ENVIRONMENT == 'PRE')
    require_once ('app/core/pre.php');
require_once (Settings::PATH['core'].'/db.conf.php');

$controller = 'home';

require_once (Settings::PATH['views'].'/layouts/header.php');

if(!isset($_REQUEST['c'])) {
    require_once (Settings::PATH['controllers']."/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->index();
}
else {
    $controller = strtolower($_REQUEST['c']);
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    $file = Settings::PATH['controllers']."/$controller.controller.php";
    if (!file_exists($file))
        require_once (Settings::PATH['404']);
    require_once ($file);
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    if (!(method_exists($controller, $action) && is_callable(array($controller, $action))))
        require_once (Settings::PATH['404']);
    call_user_func(array($controller, $action));
}

require_once (Settings::PATH['views']."/layouts/footer.php");
