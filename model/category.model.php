<?php

class Category {
	private $pdo;
	
	//class properties
	public $id;
	public $idCategoryFather;
	public $name;
	
	//db properties to convert
	public $category_id;
	public $category_father_id;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();
			
			//convert properties of db to class and destruct these properties
			$this->id = $this->category_id;
			$this->idCategoryFather = $this->category_father_id;
			unset($this->category_id);
			unset($this->category_father_id);
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	/**DB functions */

	public function getAll() {
		try {
			$sql = "SELECT * FROM CATEGORIES";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'Category');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CATEGORIES WHERE category_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Category');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getByCategoryFatherId($id) {
		try {
            $sql = "SELECT * FROM CATEGORIES WHERE category_father_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'Category');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM CATEGORIES WHERE category_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CATEGORIES SET 
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
            $sql = "INSERT INTO CATEGORIES (category_father_id, name)
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