<?php
declare(strict_types = 1);
require_once ('app/core/settings.php');
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
    
    require_once (Settings::PATH['controllers']."/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    call_user_func(array($controller, $action));
}

require_once (Settings::PATH['views']."/layouts/footer.php");
