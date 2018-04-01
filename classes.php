<?php
abstract class getset {
	function Getter();
	function setter();
}

class User extends getset {

	//функция проверки логина и пароля после нажатия кнопки входа
	
	public function login(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$emailDB = mysqli_query(select exists(SELECT * FROM users WHERE email = $email));
		$result = mysqli_query(select exists(SELECT * FROM users WHERE email = $email and password = $password);
		if(isset($_POST["submit"])) {
			if ($result == 1) {
				echo 'Hello!';
			} else echo 'Error in entire data';
		} elseif (isset($_POST["register"])) {
			if ($emailDB == 0) {
				mysqli_query(INSERT into users (email,password) values $email, $password);
			} elseif ($emailDB > 0) {
				echo 'Sorry, this email registered in our network! :(';
			}
		}
	}
}