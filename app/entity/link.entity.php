<?php

class LinkEntity {
	//class properties
    private $id;
    private $name;
	private $link;
	private $idArticle;

	//db properties to convert
	private $link_id;
	private $article_id;

	public function __CONSTRUCT() {
		try {
			//convert properties of db to class and destruct these properties
			$this->id = (int) $this->link_id;
			$this->idArticle = (int) $this->article_id;
			unset($this->link_id);
			unset($this->article_id);
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

	public function getLink() : string {
		return $this->link;
	}

	public function setLink(string $link) {
		$this->link = $link;
	}

	public function getIdArticle() : int {
		return $this->idArticle;
	}

	public function setIdArticle(int $idArticle) {
		$this->idArticle = $idArticle;
	}
	  
}
