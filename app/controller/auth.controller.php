<?php
require_once (Settings::PATH['models'].'/auth.model.php');
require_once (Settings::PATH['models'].'/user.model.php');
require_once (Settings::PATH['utils'].'/password.utils.php');

class AuthController {
    
    private $authModel;
    
    public function __CONSTRUCT() {
        $this->authModel = new Auth();
        $this->userModel = new User();
        $error = null;
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

    public function validate() {
        $auth = new AuthEntity();
        $user = new UserEntity();

        $user = $this->userModel->getOne($_REQUEST['idUser']);
        $auth->setAuthId($_REQUEST['idAuth']);
        $auth->setUsername($_REQUEST['username']);
        $auth->setPassword($_REQUEST['newPassword']);
        
        $currentPassword = $this->authModel->getOne($_REQUEST['idAuth'])->getPassword(); 
        if (!PasswordUtils::verify($_REQUEST['currentPassword'], $currentPassword)) {
            $error['INVALID_PASSWORD'] = Settings::ERRORS['INVALID_PASSWORD'];
        }
        if ($auth->getPassword() != $_REQUEST['repeatPassword']) {
            $error['PASSWORDS_NOT_MATCH'] = Settings::ERRORS['PASSWORDS_NOT_MATCH'];           
        } 
        if ($error != null) {
            require_once (Settings::PATH['views'].'/auth/authForm.php');
        }
        else {
            $this->save($auth);
        }
    }
    
    public function save($auth) {
        $this->authModel->update($auth);
        header('Location: '.Settings::PATH['base'].'/user');
    }

}
