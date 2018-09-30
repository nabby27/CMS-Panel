<?php
class User {
	private $pdo;
	
	//class properties
    public $id;
    public $name;
	public $surname;
	public $email;
	public $telephon;
	public $address;
	public $password;
	public $idType;

	//db properties to convert
	public $user_id;
	public $type_id;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();  
			
			//convert properties of db to class and destruct these properties
			$this->id = $this->user_id;
			$this->idType = $this->type_id;
			unset($this->user_id);
			unset($this->type_id);			
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM USERS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'User');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM USERS WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'User');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM USERS WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE USERS SET 
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
            $sql = "INSERT INTO USERS (name, surname, email, telephon, address, password, idType) 
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