<?php
require_once (dirname(__FILE__).'/../model/picture.model.php');
require_once (dirname(__FILE__).'/../model/article.model.php');

class PictureController {
    
    private $pictureModel;
    private $articleModel;
    
    public function __CONSTRUCT() {
        $this->pictureModel = new Picture();
        $this->articleModel = new Article();
    }
    
    public function index() {
        require_once (dirname(__FILE__).'/../view/picture/picture.php');
    }
    
    public function getAll() {
        return $this->pictureModel->getAll();
    }

    public function edit() {
        $picture = new PictureEntity();
        if(isset($_REQUEST['id'])) {
            $picture = $this->pictureModel->getOne($_REQUEST['id']);
        }
        require_once (dirname(__FILE__).'/../view/picture/pictureForm.php');
    }

    public function create() {
        $picture = new PictureEntity();

        require_once (dirname(__FILE__).'/../view/picture/pictureForm.php');
    }
    
    public function save() {
        $picture = new PictureEntity();
        $picture->setId($_REQUEST['id']);
        $picture->setPicture($_REQUEST['picture']);
        $picture->setDescription($_REQUEST['description']);      
        $picture->setIdArticle($_REQUEST['idArticle']);

        $picture->getId() > 0 ? $this->pictureModel->update($picture) : $this->pictureModel->insert($picture);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->pictureModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}
