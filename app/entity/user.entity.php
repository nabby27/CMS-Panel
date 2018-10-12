<?php

class UserEntity {
	//class properties
	private $id;
	private $username;
    private $name;
	private $surname;
	private $email;
	private $telephon;
	private $address;
	private $password;
	private $idType;

	//db properties to convert
	private $user_id;
	private $type_id;

	public function __CONSTRUCT() {
		try {
			//convert properties of db to class and destruct these properties
			$this->id = (int) $this->user_id;
			$this->idType = (int) $this->type_id;
			unset($this->user_id);
			unset($this->type_id);			
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getId() : int {
		return $this->id;
	}

	public function getUsername() : string {
		return $this->username;
	}

	public function setUsername(string $username) {
		$this->username = $username;
	}

	public function getName() : string {
		return $this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}

	public function getSurname() : string {
		return $this->surname;
	}

	public function setSurname(string $surname) {
		$this->surname = $surname;
	}

	public function getEmail() : string {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}

	public function getTelephon() : int {
		return $this->telephon;
	}

	public function setTelephon(int $telephon) {
		$this->telephon = $telephon;
	}

	public function getAddress() : string {
		return $this->address;
	}

	public function setAddress(string $address) {
		$this->address = $address;
	}

	public function getPassword() : string {
		return $this->password;
	}

	public function setPassword(string $password) {
		$this->password = $password;
	}

	public function getIdType() : int {
		return $this->idType;
	}

	public function setIdType(int $idType) {
		$this->idType = $idType;
	}
	  
}
