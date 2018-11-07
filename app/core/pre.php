<?php

class Settings extends GlobalSettings {
    
    const DB = [ 
        'user' => 'root', 
        'pass' => 'root',
        'name' => 'CMS',
        'host' => 'localhost'
    ];

    const ROOT_PATH = '/home/pi/Public'; 

    const PATH = [
        'root' => self::ROOT_PATH,
        'base' => '/CMS-Panel',
        'img' => '/CMS-Panel/assets/images',
        'models' => self::ROOT_PATH.'/CMS-Panel/app/model',
        'controllers' => self::ROOT_PATH.'/CMS-Panel/app/controller',
        'views' => self::ROOT_PATH.'/CMS-Panel/app/view',
        'entities' => self::ROOT_PATH.'/CMS-Panel/app/entity',
        'core' => self::ROOT_PATH.'/CMS-Panel/app/core',
        'utils' => self::ROOT_PATH.'/CMS-Panel/app/utils',
        '404' => self::ROOT_PATH.'/CMS-Panel/app/view/error/404.php'
    ];

    const SERVER_PATH = 'nabby27.ddns.net'.self::PATH['base'];

}

?>