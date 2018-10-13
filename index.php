<?php
declare(strict_types = 1);

require_once (dirname(__FILE__).'/app/core/db.conf.php');

$controller = 'home';

require_once (dirname(__FILE__).'/app/view/layouts/header.php');

if(!isset($_REQUEST['c'])) {
    require_once (dirname(__FILE__)."/app/controller/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->index();
}
else {
    $controller = strtolower($_REQUEST['c']);
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    
    require_once (dirname(__FILE__)."/app/controller/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    call_user_func(array($controller, $action));
}

require_once (dirname(__FILE__)."/app/view/layouts/footer.php");
