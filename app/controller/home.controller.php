<?php

class HomeController {
        
    public function __CONSTRUCT() {

    }
    
    public function index() {
        require_once (Settings::PATH['views'].'/home/home.php');
    }

}
