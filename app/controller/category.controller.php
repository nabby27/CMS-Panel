<?php
require_once (Settings::PATH['models'].'/category.model.php');

class CategoryController {
    
    private $categoryModel;
    
    public function __CONSTRUCT() {
        $this->categoryModel = new Category();
    }
    
    public function index() {
        $categories = $this->getAll();
        require_once (Settings::PATH['views'].'/category/category.php');
    }

    public function getAll() {
        return $this->categoryModel->getAll();
    }
    
    public function edit() {
        $category = new CategoryEntity();
        
        if(isset($_REQUEST['id'])) {
            $category = $this->categoryModel->getOne($_REQUEST['id']);
        }
        require_once (Settings::PATH['views'].'/category/categoryForm.php');
    }

    public function create() {
        $category = new CategoryEntity();

        require_once (Settings::PATH['views'].'/category/categoryForm.php');
    }
    
    public function save() {
        $category = new CategoryEntity();
        $categoryModel = new Category();
        
        $category->setId($_REQUEST['id']);
        if ($_REQUEST['idCategoryFather'] == null)
            $category->setIdCategoryFather($categoryModel->getOne($category->getId())->getIdCategoryFather());
        else
            $category->setIdCategoryFather($_REQUEST['idCategoryFather']);
        $category->setName($_REQUEST['name']);

        $category->getId() > 0 ? $this->categoryModel->update($category) : $this->categoryModel->insert($category);
        
        header('Location: index.php?c=category');
    }
    
    public function delete() {
        $this->categoryModel->delete($_REQUEST['id']);
        header('Location: index.php?c=category');
    }

}
