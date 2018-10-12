<?php
require_once (dirname(__FILE__).'/../entity/typeUser.entity.php');

class TypeUser {
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
            $sql = "SELECT * FROM CMS_TYPE_OF_USERS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'TypeUserEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_TYPE_OF_USERS WHERE type_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'TypeUserEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_TYPE_OF_USERS WHERE type_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CMS_TYPE_OF_USERS SET 
						type_user       = ?
				    WHERE type_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->typeUser,                        
					$data->id
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert(category $data) {
		try {
            $sql = "INSERT INTO CMS_TYPE_OF_USERS (type_user) 
                    VALUES (?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->typeUser
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
