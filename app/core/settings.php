<?php

class Settings {

    const DB = [ 
        'user' => 'root', 
        'pass' => 'root',
        'name' => 'CMS',
        'host' => 'localhost'
    ];

    
    const ROOT_PATH = '/home/ivan/Public'; 

    const PATH = [
        'root' => self::ROOT_PATH,
        'base' => '/MVC-php',
        'img' => '/MVC-php/assets/images',
        'models' => self::ROOT_PATH.'/MVC-php/app/model',
        'controllers' => self::ROOT_PATH.'/MVC-php/app/controller',
        'views' => self::ROOT_PATH.'/MVC-php/app/view',
        'entities' => self::ROOT_PATH.'/MVC-php/app/entity',
        'core' => self::ROOT_PATH.'/MVC-php/app/core',
        'utils' => self::ROOT_PATH.'/MVC-php/app/utils',
        '404' => self::ROOT_PATH.'/MVC-php/app/view/error/404.php'
    ];

    const SERVER_PATH = 'http://localhost'.self::PATH['base'];

    const ERRORS = [
        'FILE_NOT_UPLOAD' => 0
    ];

}

?>
