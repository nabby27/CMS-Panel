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
        require_once 'view/article/article.php';
    }

    public function getAll() {
        return $this->articleModel->getAll();
    }
    
    public function edit() {
        $article = new Article();
        if(isset($_REQUEST['id'])) {
            $article = $this->articleModel->getOne($_REQUEST['id']);
        }
        require_once 'view/article/articleForm.php';
    }

    public function create() {
        $article = new Article();

        require_once 'view/article/articleForm.php';
    }
    
    public function save() {
        $article = new Article();
        $article->id = $_REQUEST['id'];
        $article->name = $_REQUEST['name'];
        $article->description = $_REQUEST['description'];      
        $article->picture = $_REQUEST['picture'];
        $article->idCategory = $_REQUEST['idCategory'];

        $article->id > 0 ? $this->articleModel->update($article) : $this->articleModel->insert($article);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->articleModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}