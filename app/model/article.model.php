<?php
require_once (Settings::PATH['entities'].'/article.entity.php');
require_once (Settings::PATH['utils'].'/picture.utils.php');
require_once (Settings::PATH['models'].'/link.model.php');
require_once (Settings::PATH['models'].'/picture.model.php');

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
			return $stm->fetchAll(PDO::FETCH_CLASS, 'ArticleEntity');
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getPictureFromId($id) {
		try {
            $sql = "SELECT picture FROM CMS_ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);          
            $stm->execute(array($id));
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
			$link = new Link();
			$picture = new Picture();

			$article = $this->getOne($id);
			if ($article->getPicture() != null) 
				PictureUtils::removePicture($article->getPicture());
			
			$link->deleteFromArticleId($id);
			$picture->deleteFromArticleId($id);

            $sql = "DELETE FROM CMS_ARTICLES WHERE article_id = ?";
			$stm = $this->pdo->prepare($sql);			          
			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function deleteFromCategoryId($id) {
		try {
			$articles = $this->getByCategoryId($id);
			
			foreach ($articles as $article) {
				$link = new Link();
				$picture = new Picture();

				$article = $this->getOne($id);
				if ($article->getPicture() != null) 
					PictureUtils::removePicture($article->getPicture());
				$link->deleteFromArticleId($id);
				$picture->deleteFromArticleId($id);
			}

            $sql = "DELETE FROM CMS_ARTICLES WHERE article_id IN
						(SELECT article_id WHERE category_id = ?)";
			$stm = $this->pdo->prepare($sql);			          
			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$article = $this->getOne($data->getId());
			if ($article->getPicture() != null)
				PictureUtils::removePicture($article->getPicture());
			$picture = PictureUtils::uploadPicture($data-getPicture());
			if ($picture == Settings::ERRORS['FILE_NOT_UPLOAD'])
				return Settings::ERRORS['FILE_NOT_UPLOAD'];
				
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
                    $picture, 
					$data->getIdCategory(),
					$data->getId()
				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
			$picture = PictureUtils::uploadPicture($data-getPicture());
			if ($picture == Settings::ERRORS['FILE_NOT_UPLOAD'])
				return Settings::ERRORS['FILE_NOT_UPLOAD'];

            $sql = "INSERT INTO CMS_ARTICLES (name, description, picture, category_id) 
                    VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->getName(),
                    $data->getDescription(),
                    $picture,
					$data->getIdCategory()
				));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
