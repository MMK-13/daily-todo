<?php
	namespace Library\Models;

	class TodoManagerPDO extends TodoManager {
		public function boards() {
			$query = $this->dao->prepare("SELECT Date FROM tbltodo GROUP BY Date ORDER BY Date");
			$query->execute();
			return $query->fetchAll();
		}
		public function tasks() {
			$query = $this->dao->prepare("SELECT * FROM tbltodo INNER JOIN tblcategory ON (tbltodo.RefCategory = tblcategory.RefCategory) INNER JOIN tblstatus ON (tbltodo.RefStatus = tblstatus.RefStatus) ORDER BY tbltodo.Date, tbltodo.Hour");
			$query->execute();
			return $query->fetchAll();
		}
		public function categories() {
			$query = $this->dao->prepare("SELECT * FROM tblcategory ORDER BY Category ASC");
			$query->execute();
			return $query->fetchAll();
		}
		public function statues() {
			$query = $this->dao->prepare("SELECT * FROM tblstatus ORDER BY Status ASC");
			$query->execute();
			return $query->fetchAll();
		}
		public function addTodo($date, $hour, $title, $content, $category) {
			$query = $this->dao->prepare("INSERT INTO tbltodo (Date, Hour, Title, Content, RefCategory, RefStatus) VALUES (:date, :hour, :title, :content, :category, 1)");
			$query->bindValue(':date', $date, \PDO::PARAM_STR);
			$query->bindValue(':hour', $hour, \PDO::PARAM_STR);
			$query->bindValue(':title', $title, \PDO::PARAM_STR);
			$query->bindValue(':content', $content, \PDO::PARAM_STR);
			$query->bindValue(':category', $category, \PDO::PARAM_INT);
			$query->execute();
		}
		public function addCategory($category, $color) {
			$query = $this->dao->prepare("INSERT INTO tblcategory (Category, Color) VALUES (:category, :color)");
			$query->bindValue(':category', $category, \PDO::PARAM_STR);
			$query->bindValue(':color', $color, \PDO::PARAM_STR);
			$query->execute();
		}
		public function deleteCategory($id) {
			$query = $this->dao->prepare("DELETE FROM tblcategory WHERE RefCategory=:id");
			$query->bindValue(':id', $id, \PDO::PARAM_INT);
			$query->execute();
		}
		public function updateTodoDate($id, $date) {
			$query = $this->dao->prepare("UPDATE tbltodo SET Date=:date WHERE RefTodo=:id");
			$query->bindValue(':id', $id, \PDO::PARAM_INT);
			$query->bindValue(':date', $date, \PDO::PARAM_STR);
			$query->execute();
		}
		public function deleteTodo($id) {
			$query = $this->dao->prepare("DELETE FROM tbltodo WHERE RefTodo=:id");
			$query->bindValue(':id', $id, \PDO::PARAM_INT);
			$query->execute();
		}
		public function doneTodo($id) {
			$query = $this->dao->prepare("UPDATE tbltodo SET RefStatus=2 WHERE RefTodo=:id");
			$query->bindValue(':id', $id, \PDO::PARAM_INT);
			$query->execute();
		}
	}