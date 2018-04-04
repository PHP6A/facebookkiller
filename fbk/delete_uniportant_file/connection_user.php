<html>
  <head>
       <title>Форма и progressive enhancement</title>
	   	<meta charset="UTF-8">

	</head>
<?php
	abstract class Getter {
		public function __get($id){
			return($this->$id);
		}
	}
	
	require_once ('model.php');

	class Connection extends DB{
	// class Connection extends Getter{
	// 	public $db;
	// 	public $login;
	// 	public $password;
	// 	public $id;
		
	// 	function __construct( $login_in_constract, $password_in_constract ){
	// 		$this->db = mysqli_connect('localhost', 'stud', 'password', 'Users');
	// 		$this->login = $login_in_constract;
	// 		$this->password = $password_in_constract;
			
	// 		$this->set_login( $this->login );
	// 		$this->set_password( $this->password );
			
	// 	}
		
		 function set_login( $login ){
		 	$dbclass = DB::getDbh();
			var_dump($dbclass);
			//если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
			$this->login = stripslashes($login);
			$this->login = htmlspecialchars($this->login);
			
			//удаляем лишние пробелы
			$this->login = trim($this->login);
		}
		
		 function set_password( $password ){
			//если логин введен, то обрабатываем, чтобы теги и скрипты не работали, мало ли что люди могут ввести
			$this->password = stripslashes($password);
			$this->password = htmlspecialchars($this->password);
			
			//удаляем лишние пробелы
			$this->password = trim($this->password);
		}
		 function set_id( $id_from_class ){
			$this->id =  $id_from_class;
		}
		 function get_db(){  
			return($this->db);
		}
				
		 function get_login( ){
			return ($this->login);
		}
		
		
		 function get_password( ){
			return ($this->password);
		}
		
		function connect(){
		
		//что бы было удобнее работать со значением
		$log=$this->login;
		$pas=$this->password;
		
		//echo"$log 111\n";
		//echo"$pas 333\n";
		
		$dbclass = DB::getDbh();
			var_dump($dbclass);

		$result = mysqli_query($this->db,"SELECT id FROM logpas WHERE login='$log' and password='$pas' ");
		$myrow = mysqli_fetch_array($result);
		
		
		//print_r($myrow);
		//если мы нашли юзера с таким логином и паролем то сохраняеи в переменную ид
		if (!empty($myrow['id'])) {
			//echo"1111111111111111111\n";
			//print($myrow['id']);
			//echo"2222222222222222222\n";
			$this->set_id( $myrow['id'] );
			//$this->id = $myrow['id'];
		}
		
		}
		
	}
		
		//if (isset($_POST['login']) && isset($_POST['password'] )) { 
		//	$obj_class_Connection =  new Connection( $_POST['login'],  $_POST['password'] );
		//}
		
		//$obj_class_Connection->connect();
?>
	<body>
		<?php
		if (isset($_POST['login']) && isset($_POST['password'] )) { 
			$obj_class_Connection =  new Connection( $_POST['login'],  $_POST['password'] );
		}
		
		$obj_class_Connection->connect();
		
		
			$id_users = $obj_class_Connection->id;
			$db_from_class = $obj_class_Connection->get_db();
			$result = mysqli_query($db_from_class,"SELECT * FROM registration WHERE id='$id_users'");
			//echo "$db_from_class";
			$row = mysqli_fetch_row($result);
			//echo"$id_users";
			
			//массив со значениями о пользователе ид имя фам и тд
			
			
			
			print_r($row);
			
			//нужно для того что-бы вывести картинку в html
			
			//$img_adress = $row[3];
				

			?>
			
			<img src="./<?php echo"$img_adress"?> ">
				
		
		
    </body>


</html>