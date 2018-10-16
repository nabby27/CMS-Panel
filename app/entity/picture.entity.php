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

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getPicture() {
		return $this->picture;
	}

	public function setPicture($picture) {
		$this->picture = $picture;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription(string $description) {
		$this->description = $description;
	}

	public function getIdArticle() {
		return $this->idArticle;
	}

	public function setIdArticle(int $idArticle) {
		$this->idArticle = $idArticle;
	}
	  
}
