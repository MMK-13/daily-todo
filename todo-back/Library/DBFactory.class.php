<?php
	namespace Library;

	class DBFactory {
		public static function MySQLPDO() {
			$db = new \PDO('mysql:host=localhost;dbname=daily_todo;charset=utf8','root','');
			$db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

			return $db;
		}
		public static function MySQLMySQLi() {
			return new \MySQLi('localhost','erp','','root');
		}
	}