<?php
require_once ('database/database.php');

$controller = 'home';

require_once 'view/layouts/header.php';

if(!isset($_REQUEST['c'])) {
    require_once ("controller/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->index();    
}
else {
    $controller = strtolower($_REQUEST['c']);
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    
    require_once ("controller/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    call_user_func(array($controller, $action));
}

require_once 'view/layouts/footer.php';
