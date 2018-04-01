<html>
  <head>
       <title>Форма и progressive enhancement</title>
	   	<meta charset="UTF-8">

	</head>
<?php
	abstract class Getter {
		public function __get($id)
		{
			return($this->$id);
			
		}
	}
	
	
	class Connection extends Getter{
		private $db;
		public $login;
		public $id;
		function __construct( ){
			$this->db = mysqli_connect('localhost', 'stud', 'password', 'version1');
		}
		
		public function get_db(){  
			return($this->db);
		}
		
		function connect(){
		
		//заносим введенные пользователем данные в переменную, если он данные пустые, то уничтожаем переменную
		if (isset($_POST['login'])) { $this->login = $_POST['login']; if ($this->login == '') { unset($this->login);} } 
		if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
		
		//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
		if (empty($this->login) or empty($password)) {
			exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
		}
		
		//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
		$this->login = stripslashes($this->login);
		$this->login = htmlspecialchars($this->login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		
		
		//удаляем лишние пробелы
		$this->login = trim($this->login);
		$password = trim($password);
		
		
		$log=$this->login;//что бы было удобнее работать со значением
		$result = mysqli_query($this->db,"SELECT id FROM users WHERE login='$log' and password='$password' ");
		$myrow = mysqli_fetch_array($result);
		
		
				
		//если мы нашли юзера с таким логином и паролем то сохраняеи в переменную ид
		if (!empty($myrow['id'])) {
			$this->id = $myrow['id'];
		}
		
		}
		
	}
	$obj_class_Connection =  new Connection();
	$obj_class_Connection->connect();
?>
	<body>
			<?php
			$id_users = $obj_class_Connection->id;
			$db_from_class = $obj_class_Connection->get_db();
			$result = mysqli_query($db_from_class,"SELECT * FROM user WHERE id='$id_users'");
			
			$row = mysqli_fetch_row($result);
			//массив со значениями о пользователе ид имя фам и тд
			print_r($row);
			
			//нужно для того что-бы вывести картинку в html
			$img_adress = $row[3];
				

			?>
			
			<img src="./<?php echo"$img_adress"?> ">
				
		
		
    </body>


</html>