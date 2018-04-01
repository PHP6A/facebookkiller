<html>
  <head>
       <title>Форма и progressive enhancement</title>
	   	<meta charset="UTF-8">
		
	</head>
<?php
	//session_start(); 
	abstract class Getter {
	
	/*public function __get($login)
		{   
			//echo"aaaaaa\n";
			//$a=$this->$login;
			//echo "$a";
			//echo "$login";
			//echo"bbbbbb\n";
			return($this->$login);
			
		}
	*/
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
		function connect(){
		if (isset($_POST['login'])) { $this->login = $_POST['login']; if ($this->login == '') { unset($this->login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
		if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
		//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
		if (empty($this->login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
		{
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
		// подключаемся к базе


		//$db = mysql_connect ("localhost","stud","password");
		//mysql_select_db ("version1",$db);
		
		//$db = mysqli_connect('localhost', 'stud', 'password', 'site');

		
		//include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
		// проверка на существование пользователя с таким же логином
		
		//$result = mysqli_query($this->db,"SELECT id FROM user WHERE login='$login' and password='$password'");
		//$myrow = mysqli_fetch_array($result);
		$log=$this->login;
		$result = mysqli_query($this->db,"SELECT id FROM users WHERE login='$log' and password='$password' ");
		$myrow = mysqli_fetch_array($result);
		
		
		//print($myrow['id']);
		//print_r($myrow);
		//$myrow = mysqli_fetch_array($result);
		//$r=$result->num_rows;
		//echo"11111\n";
		//echo
		//$res = mysqli_query($db,"SELECT * FROM user where ".$myrow['id']."=id");
		//$my = mysqli_fetch_array($res);
		
		
		//print_r($my);
		//printf("Select вернул %d строк.\n", mysqli_num_rows($result));
		//echo"$res";
		
		//require_once('user.html');
		
		$a=$this->login;
		echo "$a\n";
		$this->id = $myrow['id'];
		if (!empty($myrow['id'])) {
			
			//header(" Location: index.html ");
			$r = $myrow['id'];
			echo "$r  77777\n" ;
			echo"111113333333333333";
			//require_once('http://localhost:8888/version1/user.html');
			//header ('Location:http://localhost:8888/version1/user.html');
			
		}
		//if (!empty($myrow['id'])) {
		//exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
		//}
	
		}
		
	}
	$ob2 =  new Connection();
	$ob2->connect();
?>
	<body>
			
			<?php 
				//$ob2 =  new Connection();
				//$ob2->connect();
				//$a = $ob2->login;
				//echo "999  $a 88888\n";
				$b = $ob2->id;
				echo "/// $b ";
			?>
			<img src="1.jpg">

    </body>


</html>