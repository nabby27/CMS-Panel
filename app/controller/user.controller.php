<?php
require_once (dirname(__FILE__).'/../model/user.model.php');
require_once (dirname(__FILE__).'/../model/typeUser.model.php');

class UserController {
    
    private $userModel;
    
    public function __CONSTRUCT() {
        $this->userModel = new User();
        $this->typeUserModel = new TypeUser();
    }
    
    public function index() {
        require_once (dirname(__FILE__).'/../view/user/user.php');
    }

    public function getAll() {
        return $this->userModel->getAll();
    }
    
    public function edit() {
        $user = new User();
        if(isset($_REQUEST['id'])) {
            $user = $this->userModel->getOne($_REQUEST['id']);
        }
        require_once (dirname(__FILE__).'/../view/user/userForm.php');
    }

    public function create() {
        $user = new User();

        require_once (dirname(__FILE__).'/../view/user/userForm.php');
    }
    
    public function save() {
        $user = new User();
        $user->id = $_REQUEST['id'];
        $user->name = $_REQUEST['name'];
        $user->surname = $_REQUEST['surname'];      
        $user->email = $_REQUEST['email'];
        $user->telephon = $_REQUEST['telephon'];
        $user->address = $_REQUEST['address'];
        $user->password = $_REQUEST['password'];
        $user->idType = $_REQUEST['idType'];

        $user->id > 0 ? $this->userModel->update($user) : $this->userModel->insert($user);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->userModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}