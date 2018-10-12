<?php
require_once (dirname(__FILE__).'/../model/category.model.php');

class CategoryController {
    
    private $categoryModel;
    
    public function __CONSTRUCT() {
        $this->categoryModel = new Category();
    }
    
    public function index() {
        require_once (dirname(__FILE__).'/../view/category/category.php');
    }

    public function getAll() {
        return $this->categoryModel->getAll();
    }
    
    public function edit() {
        $category = new Category();
        if(isset($_REQUEST['id'])) {
            $category = $this->categoryModel->getOne($_REQUEST['id']);
        }
        require_once (dirname(__FILE__).'/../view/category/categoryForm.php');
    }

    public function create() {
        $category = new Category();

        require_once (dirname(__FILE__).'/../view/category/categoryForm.php');
    }
    
    public function save() {
        $category = new Category();
        $category->id = $_REQUEST['id'];
        $category->idCategoryFather = $_REQUEST['idCategoryFather'];
        $category->name = $_REQUEST['name'];
        $category->id > 0 ? $this->categoryModel->update($category) : $this->categoryModel->insert($category);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->categoryModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}