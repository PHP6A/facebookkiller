<html>
  <head>
       <title>Форма и progressive enhancement</title>
	   	<meta charset="UTF-8">

	</head>
<?php

	//Подключаемся к файлу
require_once ('model.php');

	//наследуем класс DB  
	class Connection extends DB{
		 
		function connect(){
		
				// подключаемся к БД
				$dbclass = DB::getDbh();

			//заносим введенные пользователем данные в переменную, если он данные пустые, то уничтожаем переменную
			if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
			if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
			
			//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
			if (empty($login) or empty($password)) {
				exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
			}
			

			//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
			$login = stripslashes($login);
			$login = htmlspecialchars($login);
			$password = stripslashes($password);
			$password = htmlspecialchars($password);
			
			
			//удаляем лишние пробелы
			$login = trim($login);
			$password = trim($password);
			
		
			$log=$login;//что бы было удобнее работать со значением
			$result = $dbclass->prepare("SELECT id FROM users WHERE login=':log' and password=':password' ");
			$result->execute(array(':log' => $log, ':password' => $password));
			// $myrow = mysqli_fetch_array($result);
			$myrow = $result->fetch(PDO::FETCH_ASSOC);
			//если мы нашли юзера с таким логином и паролем то сохраняеи в переменную ид
			if (!empty($myrow['id'])) {
				$id = $myrow['id'];
			}
		
		}
		
	}
?>
	<body>
			<?php

			require_once ('model.php');
			$dbclass = DB::getDbh();

			foreach ($dbclass->query("SELECT * FROM user") as $row) {
				$img_adress = $row['img'];
			}
				

			?>
			
			<img src="./<?php echo"$img_adress"?> ">
				
		
		
    </body>


</html>