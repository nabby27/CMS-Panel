<?php

class PasswordUtils {	
    
    public function encrypt($password) {
        $options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_DEFAULT, $options);
    }

    public function verifyPasswords($pass, $pass2) {
        return ($pass == $pass2);
    }

}

?>
