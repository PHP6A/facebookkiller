<meta charset="utf-8">

<?php 

	class Db {
		private static $_instance;
		private $query;
		private $connection;

		private function __construct() {
			$this->setConnection();
		}
		
		private function __clone() {}
		private function __wakeup() {}

		public static function getInstance() {
	        if (null === self::$_instance) {
	            self::$_instance = new self;
	        }
	        return self::$_instance;
    	}

		private function setConnection() {
			$this->connection = mysqli_connect('localhost', 'root', '456758', 'Users');
			if(!$this->connection) {
				die('Не удалось установить соединение с базой данных.');
			}
		}

		public function query($sql) {
			$this->query = $sql;
			$result = mysqli_query($this->connection, $sql);
			return $result;
		}

		private function query_result($result) {
			if(!$result) {
				die('Не удалось выполнить запрос к базе данных.');
			}
		}

		public function escape($string) {
			return mysqli_real_escape_string($this->connection, $string);
		}

		public function fetch_assoc($result) {
			return mysqli_fetch_assoc($result);
		}

	}
