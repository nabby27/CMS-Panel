<?php

class PictureEntity {
	//class properties
    private $id;
	private $picture;
    private $description;
	private $idArticle;

	//db properties to convert
	private $picture_id;
	private $article_id;

	public function __CONSTRUCT() {
		try {
			//convert properties of db to class and destruct these properties
			$this->id = (int) $this->picture_id;
			$this->idArticle = (int) $this->article_id;
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getId() : int {
		return $this->id;
	}

	public function getPicture() : string {
		return $this->picture;
	}

	public function setPicture(string $picture) {
		$this->picture = $picture;
	}

	public function getDescription() : string {
		return $this->description;
	}

	public function setDescription(string $description) {
		$this->description = $description;
	}

	public function getIdArticle() : int {
		return $this->idArticle;
	}

	public function setIdArticle(int $idArticle) {
		$this->idArticle = $idArticle;
	}
	  
}
