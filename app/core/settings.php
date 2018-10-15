<?php

class Settings {
    private static $instance;

    const DB = [ 
        'user' => 'root', 
        'pass' => 'root',
        'name' => 'CMS',
        'host' => 'localhost'
    ];

    const PATH = [
        'root' => '/home/ivan/Public',
        'img' => '/MVC-php/assets/images',
        'models' => '/home/ivan/Public/MVC-php/app/model',
        'controllers' => '/home/ivan/Public/MVC-php/app/controller',
        'views' => '/home/ivan/Public/MVC-php/app/view',
        'entities' => '/home/ivan/Public/MVC-php/app/entity',
        'core' => '/home/ivan/Public/MVC-php/app/core'

    ];

    public static function singleton()  {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}

?>
