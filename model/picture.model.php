<?php
class Picture {
	private $pdo;
	
	//class properties
    public $id;
	public $picture;
    public $description;
	public $idArticle;

	//db properties to convert
	public $picture_id;
	public $article_id;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();    
			
			//convert properties of db to class and destruct these properties
			$this->id = $this->picture_id;
			$this->idArticle = $this->article_id;
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM PICTURES";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'Picture');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM PICTURES WHERE picture_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Picture');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByArticleId($id) {
		try {
            $sql = "SELECT * FROM PICTURES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Picture');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM PICTURES WHERE picture_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE PICTURES SET 
						picture				= ?,					
						description         = ?,
						article_id			= ?
				    WHERE picture_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->picture, 
                    $data->description,
					$data->idArticle,
					$data->id
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert(category $data) {
		try {
            $sql = "INSERT INTO PICTURES (picture, description, article_id) 
                    VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->picture, 
					$data->description,
					$data->idArticle
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}