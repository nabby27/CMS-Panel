<?php
require_once (dirname(__FILE__).'/../entity/category.entity.php');

class Category {
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
			$sql = "SELECT * FROM CMS_CATEGORIES";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'CategoryEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_CATEGORIES WHERE category_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'CategoryEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByCategoryFatherId($id) {
		try {
            $sql = "SELECT * FROM CMS_CATEGORIES WHERE category_father_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'CategoryEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_CATEGORIES WHERE category_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CMS_CATEGORIES SET 
						category_father_id  = ?,
						name                = ?
				    WHERE category_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
                    $data->idCategoryFather,
                    $data->name,
                    $data->id
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
            $sql = "INSERT INTO CMS_CATEGORIES (category_father_id, name)
                    VALUES (?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                    $data->idCategoryFather,
                    $data->name
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

}
