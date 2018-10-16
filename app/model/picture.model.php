<?php
require_once (Settings::PATH['entities'].'/picture.entity.php');
require_once (Settings::PATH['utils'].'/picture.utils.php');

class Picture {
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
            $sql = "SELECT * FROM CMS_PICTURES";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'PictureEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_PICTURES WHERE picture_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'PictureEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByArticleId($id) {
		try {
			$sql = "SELECT * FROM CMS_PICTURES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_CLASS, 'PictureEntity');
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getPictureFromId($id) {
		try {
            $sql = "SELECT picture FROM CMS_PICTURES WHERE picture_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
			$picture = $this->getOne($id);
			if ($picture->getPicture() != null)
				PictureUtils::removePicture($picture->getPicture());
			
			$sql = "DELETE FROM CMS_PICTURES WHERE picture_id = ?";
			$stm = $this->pdo->prepare($sql);			          
			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function deleteFromArticleId($id) {
		try {
            $sql = "DELETE FROM CMS_PICTURES WHERE picture_id IN 
						(SELECT picture_id WHERE article_id = ?)";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			echo "Hola";
			$picture = $this->getOne($data->getId());
			if ($data->getPicture()['size'] > 0) {
				if ($picture->getPicture() != null)
					PictureUtils::removePicture($picture->getPicture());
				$pictureName = PictureUtils::uploadPicture($data->getPicture()); 
				if ($pictureName == Settings::ERRORS['FILE_NOT_UPLOAD'])
					return Settings::ERRORS['FILE_NOT_UPLOAD'];
			} else
				$pictureName = $picture->getPicture();

			$sql = "UPDATE CMS_PICTURES SET 
						picture				= ?,					
						description         = ?,
						article_id			= ?
				    WHERE picture_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$pictureName,
                    $data->getDescription(),
					$data->getIdArticle(),
					$data->getId()
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
			$picture = PictureUtils::uploadPicture($data->getPicture());
			if ($picture == Settings::ERRORS['FILE_NOT_UPLOAD'])
				return Settings::ERRORS['FILE_NOT_UPLOAD'];

            $sql = "INSERT INTO CMS_PICTURES (picture, description, article_id) 
                    VALUES (?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$picture, 
					$data->getDescription(),
					$data->getIdArticle()
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
