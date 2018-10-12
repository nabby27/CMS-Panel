<?php
require_once (dirname(__FILE__).'/../entity/article.entity.php');

class Article {
	private $pdo;
	
	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();  		
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM CMS_ARTICLES";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'ArticleEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'ArticleEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByCategoryId($id) {
		try {
            $sql = "SELECT * FROM CMS_ARTICLES WHERE category_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'ArticleEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) : boolean {
		try {
            $sql = "DELETE FROM CMS_ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);			          
			$stm->execute(array($id));
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	public function update($data) : boolean {
		try {
			$sql = "UPDATE CMS_ARTICLES SET 
						name                = ?, 
						description         = ?,
						picture				= ?,					
						category_id			= ?
				    WHERE article_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->name,                        
                    $data->description,
                    $data->picture, 
					$data->idCategory,
					$data->id
				));
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	public function insert(category $data) : boolean {
		try {
			var_dump($data);
            $sql = "INSERT INTO CMS_ARTICLES (name, description, picture, category_id) 
                    VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->name,
                    $data->description,
                    $data->picture, 
					$data->idCategory
				));
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}
	  
}
