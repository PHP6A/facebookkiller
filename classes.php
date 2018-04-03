<?php
abstract class getset {
	function Getter();
	function setter();
}

function autoloader($class){
	require_once"($class).'php'";
}

spl_autoload('autoloader');

class User extends getset {

	//функция проверки логина и пароля после нажатия кнопки входа
	protected $email;
	protected $password;
	public $id;
	public $name;
	public $surname;
	public $age;
	public $gender;
	public $city;
	public $hobbie;
	public $conf_pwd;

	public function login(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$emailDB = mysqli_query(select exists(SELECT * FROM users WHERE email = $email));
		$result = mysqli_query(select exists(SELECT * FROM users WHERE email = $email and password = $password));
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

class Reg extends User {

	public $error = [];

	protected function __construct($email,$password,$conf_pwd){
		$this->email = $email;
		$this->password = $password;
		$this->conf_pwd = $conf_pwd;
		$this->date = date('d.m.y');
	}

	function genSalt($int){
    	$chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZZXCVBNM0123456789<>[]{};';
    	$count = strlen($chars);
    	$count--;
    	$salt=NULL;
    	
    	for($x=1;$x<=$int;$x++){ 
        	$rand = rand(0,$count);
        	$salt .= substr($chars,$rand,1); 
    	}

	return $salt;
	}

	public function genHash($algoritm=PASSWORD_DEFAULT, array $option=null){
		!is_null($option)?:$option=[
			'salt'=>$this->genSalt(20),
		]
		$this->password = password_hash($this->password,$algoritm,$option);
	}
}