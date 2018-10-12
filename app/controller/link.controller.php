<?php
require_once (dirname(__FILE__).'/../model/link.model.php');
require_once (dirname(__FILE__).'/../model/article.model.php');

class LinkController {
    
    private $linkModel;
    private $articleModel;
    
    public function __CONSTRUCT() {
        $this->linkModel = new Link();
        $this->articleModel = new Article();
    }
    
    public function index() {
        require_once (dirname(__FILE__).'/../view/link/link.php');
    }

    public function getAll() {
        return $this->linkModel->getAll();
    }
    
    public function edit() {
        $link = new Link();
        if(isset($_REQUEST['id'])) {
            $link = $this->linkModel->getOne($_REQUEST['id']);
        }
        require_once (dirname(__FILE__).'/../view/link/linkForm.php');
    }

    public function create() {
        $link = new Link();

        require_once (dirname(__FILE__).'/../view/link/linkForm.php');
    }
    
    public function save() {
        $link = new Link();
        $link->id = $_REQUEST['id'];
        $link->name = $_REQUEST['name'];      
        $link->link = $_REQUEST['link'];
        $link->idArticle = $_REQUEST['idArticle'];

        $link->id > 0 ? $this->linkModel->update($link) : $this->linkModel->insert($link);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->linkModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}