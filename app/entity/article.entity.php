<?php

class ArticleEntity {	
	//class properties
    private $id;
    private $name;
    private $description;
	private $picture;
	private $idCategory;

	//db properties to convert
	private $article_id;
	private $category_id;

	public function __CONSTRUCT() {
		try {			
			//convert properties of db to class and destruct these properties
			$this->id = (int) $this->article_id;
			$this->idCategory = (int) $this->category_id;
			unset($this->article_id);
			unset($this->category_id);			
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
	
	public function getName() {
		return $this->name;
	}

	public function setName(String $name) {
		$this->name = $name;
	}
	
	public function getDescription() {
		return $this->description;
	}

	public function setDescription(String $description) {
		$this->description = $description;
	}

	public function getPicture() {
		return $this->picture;
	}

	public function setPicture(String $picture) {
		$this->picture = $picture;
	}

	public function getIdCategory() {
		return $this->idCategory;
	}

	public function setIdCateogory($idCategory) {
		$this->idCategory = $idCategory;
	}

}
