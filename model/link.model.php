<?php
class Link {
	private $pdo;
	
	//class properties
    public $id;
    public $name;
	public $link;
	public $idArticle;

	//db properties to convert
	public $link_id;
	public $article_id;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();
			
			//convert properties of db to class and destruct these properties
			$this->id = $this->link_id;
			$this->idArticle = $this->article_id;
			unset($this->link_id);
			unset($this->article_id);
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM LINKS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'Link');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM LINKS WHERE link_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Link');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByArticleId($id) {
		try {
            $sql = "SELECT * FROM LINKS WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Link');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM LINKS WHERE link_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE LINKS SET 
						name         	= ?,
						link			= ?,					
						article_id		= ?
				    WHERE link_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->name, 
                    $data->link,
					$data->idArticle,
					$data->id
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert(category $data) {
		try {
            $sql = "INSERT INTO LINKS (name, link, article_id) 
                    VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->name,
					$data->link, 
					$data->idArticle
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}