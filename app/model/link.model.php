<?php
require_once (Settings::PATH['entities'].'/link.entity.php');

class Link {
	private $pdo;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();;
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM CMS_LINKS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'LinkEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_LINKS WHERE link_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'LinkEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByArticleId($id) {
		try {
            $sql = "SELECT * FROM CMS_LINKS WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_CLASS, 'LinkEntity');
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_LINKS WHERE link_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function deleteFromArticleId($id) {
		try {
            $sql = "DELETE FROM CMS_LINKS WHERE link_id IN 
						(SELECT link_id WHERE article_id = ?)";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CMS_LINKS SET 
						name         	= ?,
						link			= ?,					
						article_id		= ?
				    WHERE link_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->getName(), 
                    $data->getLink(),
					$data->getIdArticle(),
					$data->getId()
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
            $sql = "INSERT INTO CMS_LINKS (name, link, article_id) 
                    VALUES (?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->getName(),
					$data->getLink(), 
					$data->getIdArticle()
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
