<?php
require_once (Settings::PATH['models'].'/auth.model.php');
require_once (Settings::PATH['models'].'/user.model.php');
require_once (Settings::PATH['models'].'/typeUser.model.php');

class AuthController {
    
    private $authModel;
    
    public function __CONSTRUCT() {
        $this->authModel = new Auth();
        $this->userModel = new User();
    }
    
    public function edit() {
        $auth = new AuthEntity();
        $user = new UserEntity();
        if(isset($_REQUEST['id'])) {
            $auth = $this->authModel->getByUserId($_REQUEST['id']);
            $user = $this->userModel->getOne($_REQUEST['id']);
        }
        require_once (Settings::PATH['views'].'/auth/authForm.php');
    }
    
    public function save() {
        $auth = new AuthEntity();

        $user->setId($_REQUEST['id']);
        $user->setUsername($_REQUEST['username']);
        $user->setName($_REQUEST['name']);
        $user->setSurname($_REQUEST['surname']);      
        $user->setEmail($_REQUEST['email']);
        $user->setTelephon($_REQUEST['telephon']);
        $user->setAddress($_REQUEST['address']);
        $user->setPassword($_REQUEST['password']);
        $user->setIdType($_REQUEST['idType']);

        $this->userModel->update($user);

        header('Location: '.Settings::PATH['base'].'/user');
    }

}
