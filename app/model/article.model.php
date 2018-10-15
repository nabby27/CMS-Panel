<?php
require_once (Settings::PATH['entities'].'/article.entity.php');

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

	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);			          
			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CMS_ARTICLES SET 
						name                = ?, 
						description         = ?,
						picture				= ?,					
						category_id			= ?
				    WHERE article_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->getName(),                        
                    $data->getDescription(),
                    $data->getPicture(), 
					$data->getIdCategory(),
					$data->getId()
				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
            $sql = "INSERT INTO CMS_ARTICLES (name, description, picture, category_id) 
                    VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->getName(),
                    $data->getDescription(),
                    $data->getPicture(), 
					$data->getIdCategory()
				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
