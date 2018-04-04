<?php 

	class DB {

		//Обозначение подключения к БД
		public static $dsn = 'mysql:host=localhost; dbname=version1';
		public static $user = 'root';
		public static $pass = '';

		//Объекты ПДО
		public static $dbh = null;

		public static $sth = null;

		// SQL запросы
		public static $query = '';

		// Подключение к БД
		public static function getDbh(){  
	        if (!self::$dbh) {
	            try {
	                self::$dbh = new PDO(
	                    self::$dsn, 
	                    self::$user, 
	                    self::$pass, 
	                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	            
	            // Выборка аьрибутов, покажет стандартные ошибки
	            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	        	}
	        	catch (PDOException $e) {
	        		exit ('Error connecting to database: ' . $e->getMessage());
	        	}
	    	}
	     return self::$dbh;
	    
	    }
}
