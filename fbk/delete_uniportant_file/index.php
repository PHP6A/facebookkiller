<?php 

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	function autoload($className) {
		$fileName = str_replace("\\", "/", strtolower($className)) . ".php";
		file_exists($fileName) ? require_once($fileName) : die('Class not found');
	}

	spl_autoload_register('autoload');

	// подключаемся к БД
	$db = Db::getInstance();

	if(isset($_POST['submit'])){
		$login = $db->escape($_POST['login']);
		$password = $db->escape($_POST['password']);
		$confirm_password = $db->escape($_POST['cpassword']);
		$email = $db->escape($_POST['email']);

		// передаем в переменную user экземпляр класса Register
		$user = new Register($login, $password, $confirm_password, $email);

		// проверяем, существует ли логин в БД
		$result = $db->query("SELECT count(login) FROM registration WHERE login = '{$user->login}'");
		$row = $db->fetch_assoc($result);
		$user->unique($row, 'Пользователь с логином '.$user->login.' уже существует!');

		// проверяем, существует ли email в БД
		$result = $db->query("SELECT count(email) FROM registration WHERE email = '{$user->email}'");
		$row = $db->fetch_assoc($result);
		$user->unique($row, 'Пользователь с почтовым адресом '.$user->email.' уже существует!');

		// сравниваем пароли
		$user->checkPassword($user->password, $user->confirm_password, 'Пароли не совпадают!');

		// если нет ошибок, можем зарегать юзера
		if(empty($user->getErrors())) {
			// хешируем пароль
			$user->passHash(PASSWORD_DEFAULT);

			//записывает в переменную запрос на добавление юзера
			$insert = $db->query("INSERT INTO registration(login, email, password) VALUES('{$user->login}','{$user->email}','{$user->password}')");
			
			$result_add_in_table_users = $db->query ("INSERT INTO logpas (login,password) VALUES('{$user->login}','{$user->password}')");
			//$result_add_in_table_user = mysqli_query ($this->db,"INSERT INTO user (name,surname,img,city) VALUES('$name','$surname','$uniq_name_img','$city')");
		
			
			
			if($insert) {
				echo '<div style="color: green; font-weight: bold;">Регистрация прошла успешно!</div><hr />';
			} else {
        		echo '<div style="color: blue; font-weight: bold;">Ошибка добавления! Проверьте параметры базы данных!</div><hr/>';
      		}

		} else {
			echo '<div style="color: red; font-weight: bold;">' . array_shift($user->errors) . '</div><hr/>';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Социльная сеть</title>
	<meta charset="utf-8">
</head>
<body>

	<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
		<label><p>Введите логин</p><input type="text" name="login" value="<?php if(isset($_POST['login'])):?><?php echo $user->login; ?><?php endif ?>" required></label>
		<label><p>Введите пароль</p><input type="password" name="password" required></label>
		<label><p>Введите пароль повторно</p><input type="password" name="cpassword" required></label>
		<label><p>Введите почтовый адрес</p><input type="email" name="email" value="<?php if(isset($_POST['email'])):?><?php echo $user->email; ?><?php endif ?>" required></label>
		<br/><br/>
		<input type="submit" name="submit">
	</form>

</body>
</html>