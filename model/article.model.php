<?php
class Article {
	private $pdo;
	
	//class properties
    public $id;
    public $name;
    public $description;
	public $picture;
	public $idCategory;

	//db properties to convert
	public $article_id;
	public $category_id;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();  
			
			//convert properties of db to class and destruct these properties
			$this->id = $this->article_id;
			$this->idCategory = $this->category_id;
			unset($this->article_id);
			unset($this->category_id);			
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM ARTICLES";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'Article');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Article');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByCategoryId($id) {
		try {
            $sql = "SELECT * FROM ARTICLES WHERE category_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Article');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE ARTICLES SET 
						name                = ?, 
						description         = ?,
						picture				= ?,					
						category_id			= ?
				    WHERE article_id = ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->name,                        
                    $data->description,
                    $data->picture, 
					$data->idCategory,
					$data->id
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert(category $data) {
		try {
            $sql = "INSERT INTO ARTICLES (name, description, picture, category_id) 
                    VALUES (?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->name,
                    $data->description,
                    $data->picture, 
					$data->idCategory
			));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}