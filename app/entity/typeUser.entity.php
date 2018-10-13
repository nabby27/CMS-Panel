<?php

class TypeUserEntity {
	//class properties
    private $id;
	private $typeUser;
	
	//db properties to convert
	private $type_id;
	private $type_user;

	public function __CONSTRUCT() {
		try {
			//convert properties of db to class and destruct these properties
			$this->id = (int) $this->type_id;
			$this->typeUser = (string) $this->type_user;
			unset($this->type_id);
			unset($this->type_user);
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getTypeUser() {
		return $this->typeUser;
	}

	public function setTypeUser(string $typeUser) {
		$this->typeUser = $typeUser;
	}
	  
}
