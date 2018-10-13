<?php
require_once (dirname(__FILE__).'/../model/article.model.php');
require_once (dirname(__FILE__).'/../model/category.model.php');

class ArticleController {
    
    private $articleModel;
    
    public function __CONSTRUCT() {
        $this->articleModel = new Article();
        $this->categoryModel = new Category();
    }
    
    public function index() {
        require_once (dirname(__FILE__).'/../view/article/article.php');
    }

    public function getAll() {
        return $this->articleModel->getAll();
    }
    
    public function edit() {
        $article = new ArticleEntity();
        if(isset($_REQUEST['id'])) {
            $article = $this->articleModel->getOne($_REQUEST['id']);
        }
        require_once (dirname(__FILE__).'/../view/article/articleForm.php');
    }

    public function create() {
        $article = new ArticleEntity();
        
        require_once (dirname(__FILE__).'/../view/article/articleForm.php');
    }
    
    public function save() {
        $article = new ArticleEntity();
        $article->setId($_REQUEST['id']);
        $article->setName($_REQUEST['name']);
        $article->setDescription($_REQUEST['description']);      
        $article->setPicture($_REQUEST['picture']);
        $article->setIdCategory($_REQUEST['idCategory']);
        
        $article->getId() > 0 ? $this->articleModel->update($article) : $this->articleModel->insert($article);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->articleModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}
