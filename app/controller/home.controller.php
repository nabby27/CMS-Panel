<?php

class HomeController {
        
    public function __CONSTRUCT() {

    }
    
    public function index() {
        require_once (dirname(__FILE__).'/../view/home/home.php');
    }

}
