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
        $user = new UserEntity();
        if(isset($_REQUEST['id'])) {
            $user = $this->userModel->getOne($_REQUEST['id']);
        }
        require_once (dirname(__FILE__).'/../view/user/userForm.php');
    }

    public function create() {
        $user = new UserEntity();

        require_once (dirname(__FILE__).'/../view/user/userForm.php');
    }
    
    public function save() {
        $user = new UserEntity();
        $user->setId($_REQUEST['id']);
        $user->setName($_REQUEST['name']);
        $user->setSurname($_REQUEST['surname']);      
        $user->setEmail($_REQUEST['email']);
        $user->setTelephon($_REQUEST['telephon']);
        $user->setAddress($_REQUEST['address']);
        $user->setPassword($_REQUEST['password']);
        $user->setIdType($_REQUEST['idType']);

        $user->getId() > 0 ? $this->userModel->update($user) : $this->userModel->insert($user);
        
        header('Location: index.php');
    }
    
    public function delete() {
        $this->userModel->delete($_REQUEST['id']);
        header('Location: index.php');
    }

}
