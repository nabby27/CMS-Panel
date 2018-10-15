<?php
require_once (Settings::PATH['models'].'/link.model.php');
require_once (Settings::PATH['models'].'/article.model.php');

class LinkController {
    
    private $linkModel;
    private $articleModel;
    
    public function __CONSTRUCT() {
        $this->linkModel = new Link();
        $this->articleModel = new Article();
    }
    
    public function index() {
        $links = $this->getAll();
        require_once (Settings::PATH['views'].'/link/link.php');
    }

    public function getAll() {
        return $this->linkModel->getAll();
    }

    public function list() {        
        if(isset($_REQUEST['idArticle'])) {
            $links = $this->linkModel->getByArticleId($_REQUEST['idArticle']);
        }
        require_once (Settings::PATH['views'].'/link/link.php');
    }
    
    public function edit() {
        $link = new LinkEntity();
        
        if(isset($_REQUEST['id'])) {
            $link = $this->linkModel->getOne($_REQUEST['id']);
        }
        require_once (Settings::PATH['views'].'/link/linkForm.php');
    }

    public function create() {
        $link = new LinkEntity();

        require_once (Settings::PATH['views'].'/link/linkForm.php');
    }
    
    public function save() {
        $link = new LinkEntity();

        $link->setId($_REQUEST['id']);
        $link->setName($_REQUEST['name']);      
        $link->setLink($_REQUEST['link']);
        $link->setIdArticle($_REQUEST['idArticle']);

        $link->getId() > 0 ? $this->linkModel->update($link) : $this->linkModel->insert($link);
        
        header('Location: index.php?c=link');
    }
    
    public function delete() {
        $this->linkModel->delete($_REQUEST['id']);
        header('Location: index.php?c=link');
    }

}
