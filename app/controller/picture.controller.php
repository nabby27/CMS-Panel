<?php
require_once (Settings::PATH['models'].'/picture.model.php');
require_once (Settings::PATH['models'].'/article.model.php');

class PictureController {
    
    private $pictureModel;
    private $articleModel;
    
    public function __CONSTRUCT() {
        $this->pictureModel = new Picture();
        $this->articleModel = new Article();
    }
    
    public function index() {
        $pictures = $this->getAll();
        require_once (Settings::PATH['views'].'/picture/picture.php');
    }
    
    public function getAll() {
        return $this->pictureModel->getAll();
    }

    public function list() {
        if(isset($_REQUEST['idArticle'])) {
            $pictures = $this->pictureModel->getByArticleId($_REQUEST['idArticle']);
        }
        require_once (Settings::PATH['views'].'/picture/picture.php');
    }

    public function edit() {
        $picture = new PictureEntity();
        
        if(isset($_REQUEST['id'])) {
            $picture = $this->pictureModel->getOne($_REQUEST['id']);
        }
        require_once (Settings::PATH['views'].'/picture/pictureForm.php');
    }

    public function create() {
        $picture = new PictureEntity();

        require_once (Settings::PATH['views'].'/picture/pictureForm.php');
    }
    
    public function save() {
        $picture = new PictureEntity();
        
        $picture->setId($_REQUEST['id']);
        $picture->setPicture($_REQUEST['picture'] != null ? $_REQUEST['picture'] : $this->pictureModel->getPictureFromId($picture->getId())['picture']);
        $picture->setDescription($_REQUEST['description']);      
        $picture->setIdArticle($_REQUEST['idArticle']);

        $picture->getId() > 0 ? $this->pictureModel->update($picture) : $this->pictureModel->insert($picture);
        
        header('Location: index.php?c=picture');
    }
    
    public function delete() {
        $this->pictureModel->delete($_REQUEST['id']);
        header('Location: index.php?c=picture');
    }

}
