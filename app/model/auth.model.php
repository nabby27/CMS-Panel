<?php
require_once (Settings::PATH['entities'].'/auth.entity.php');
require_once (Settings::PATH['utils'].'/password.utils.php');

class Auth {
	private $pdo;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();  		
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM CMS_AUTH";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'AuthEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_AUTH WHERE auth_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'AuthEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }

    public function getByUserId($id) {
        try {
            $sql = "SELECT * FROM CMS_AUTH WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'AuthEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }
    
    public function getAuthByUserData($data) {
        $auth = new AuthEntity();
        
        var_dump($data->getId());
        $auth->setUserId($data->getId());
        $auth->setPassword($data->getPassword());
        $auth->setUsername($data->getUsername());
        return $auth;
    }


	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_AUTH WHERE auth_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
    }
    
    public function deleteFromUserId($id) {
		try {
            $sql = "DELETE FROM CMS_AUTH WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$password = PasswordUtils::encrypt($data->getPassword());
			$sql = "UPDATE CMS_AUTH SET 
						username		= ?,
						password        = ?
				    WHERE auth_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->getUsername(),                        
					$password,
					$data->getId()
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
			$password = PasswordUtils::encrypt($data->getPassword());
            $sql = "INSERT INTO CMS_AUTH (user_id, username, password) 
                    VALUES (?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                    $data->getUserId(),
					$data->getUsername(),                        
					$password
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
