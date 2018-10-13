<?php

class CategoryEntity {	
	//class properties
	private $id; 
	private $idCategoryFather;
	private $name;
	
	//db properties to convert
	private $category_id;
	private $category_father_id;

	public function __CONSTRUCT() {
		try {
			//convert properties of db to class and destruct these properties
			$this->id = (int) $this->category_id;
			$this->idCategoryFather = (int) $this->category_father_id;
			unset($this->category_id);
			unset($this->category_father_id);
			/*settype($id, "integer");
			settype($idCategoryFather, "integer");
			settype($name, "string");*/
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

	public function getIdCategoryFather() {
		return $this->idCategoryFather;
	}

	public function setIdCategoryFather(int $idCategoryFather) {
		$this->idCategoryFather = $idCategoryFather;
	}

	public function getName() {
		return $this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}

}
