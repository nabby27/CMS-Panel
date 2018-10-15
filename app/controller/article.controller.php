<?php
require_once (Settings::PATH['models'].'/article.model.php');
require_once (Settings::PATH['models'].'/category.model.php');

class ArticleController {
    
    private $articleModel;
    
    public function __CONSTRUCT() {
        $this->articleModel = new Article();
        $this->categoryModel = new Category();
    }
    
    public function index() {
        $articles = $this->getAll();
        require_once (Settings::PATH['views'].'/article/article.php');
    }

    public function getAll() {
        return $this->articleModel->getAll();
    }

    public function list() {
        if(isset($_REQUEST['idCategory'])) {
            $articles = $this->articleModel->getByCategoryId($_REQUEST['idCategory']);
        }
        require_once (Settings::PATH['views'].'/article/article.php');
    }
    
    public function edit() {
        $article = new ArticleEntity();

        if(isset($_REQUEST['id'])) {
            $article = $this->articleModel->getOne($_REQUEST['id']);
        }
        require_once (Settings::PATH['views'].'/article/articleForm.php');
    }

    public function create() {
        $article = new ArticleEntity();
        
        require_once (Settings::PATH['views'].'/article/articleForm.php');
    }
    
    public function save() {
        $article = new ArticleEntity();

        $article->setId( (int) $_REQUEST['id']);
        $article->setName($_REQUEST['name']);
        $article->setDescription($_REQUEST['description']);
        $article->setPicture($_REQUEST['picture'] != null ? $_REQUEST['picture'] : $this->articleModel->getPictureFromId($article->getId())['picture']);
        $article->setIdCategory($_REQUEST['idCategory']);


        $article->getId() > 0 ? $this->articleModel->update($article) : $this->articleModel->insert($article);
        
        header('Location: index.php?c=article');
    }
    
    public function delete() {
        $this->articleModel->delete($_REQUEST['id']);
        header('Location: index.php?c=article');
    }

}
