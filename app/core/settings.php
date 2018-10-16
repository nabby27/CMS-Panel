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
        'img' => '/MVC-php/assets/images',
        'models' => self::ROOT_PATH.'/MVC-php/app/model',
        'controllers' => self::ROOT_PATH.'/MVC-php/app/controller',
        'views' => self::ROOT_PATH.'/MVC-php/app/view',
        'entities' => self::ROOT_PATH.'/MVC-php/app/entity',
        'core' => self::ROOT_PATH.'/MVC-php/app/core',
        'utils' => self::ROOT_PATH.'/MVC-php/app/utils'
    ];

    const ERRORS = [
        'FILE_NOT_UPLOAD' => 0,
        'PASSWORD_NOT_MATCH' => 1
    ];

}

?>
