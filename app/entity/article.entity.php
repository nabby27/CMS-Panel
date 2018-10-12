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

	public function getId() : int {
		return $this->id;
	}
	
	public function getName() : string {
		return $this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}
	
	public function getDescription(): string {
		return $this->description;
	}

	public function setDescription(string $description) {
		$this->description = $description;
	}

	public function getPicture() : string {
		return $this->picture;
	}

	public function setPicture(string $picture) {
		$this->picture = $picture;
	}

	public function getIdCategory() : int {
		return $this->idCategory;
	}

	public function setIdCateogory(int $idCategory) {
		$this->idCategory = $idCategory;
	}

}
