<?php
class TypeUser {
	private $pdo;
	
	//class properties
    public $id;
	public $typeUser;
	
	//db properties to convert
	public $type_id;
	public $type_user;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();  
			
			//convert properties of db to class and destruct these properties
			$this->id = $this->type_id;
			$this->typeUser = $this->type_user;
			unset($this->type_id);
			unset($this->type_user);
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM TYPE_OF_USERS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'TypeUser');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM TYPE_OF_USERS WHERE type_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'TypeUser');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM TYPE_OF_USERS WHERE type_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE TYPE_OF_USERS SET 
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
            $sql = "INSERT INTO TYPE_OF_USERS (type_user) 
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