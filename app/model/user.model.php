<?php
require_once (dirname(__FILE__).'/../entity/user.entity.php');

class User {
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
            $sql = "SELECT * FROM CMS_USERS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'UserEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_USERS WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'UserEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_USERS WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CMS_USERS SET 
						name            = ?, 
						surname         = ?,
						email			= ?,					
						telephon		= ?,
						address         = ?,
						password        = ?,
						type_id         = ?
				    WHERE user_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->name,                        
                    $data->surname,
                    $data->email, 
					$data->telephon,
					$data->address,
					$data->password,
					$data->idType,
					$data->id
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert(category $data) {
		try {
            $sql = "INSERT INTO CMS_USERS (name, surname, email, telephon, address, password, idType) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->name,                        
                    $data->surname,
                    $data->email, 
					$data->telephon,
					$data->address,
					$data->password,
					$data->idType,
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
