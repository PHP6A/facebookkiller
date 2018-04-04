<?php 
	class User {
		public $id;
		public $login;
		public $password;
		public $email;
	}
	class Register extends User {
		public $confirm_password;
		public $errors = [];

		public function __construct($login, $password, $confirm_password, $email) {
			$this->login = $login;
			$this->password = $password;
			$this->confirm_password = $confirm_password;
			$this->email = $email;
		}

		public function unique(array $row, $err) {
			if(array_shift($row)) {
				$this->errors[] = $err;
			}
		}

		public function checkPassword($pass1, $pass2, $err) {
			if($pass1 != $pass2) {
				$this->errors[] = $err;
			}
		}

		public function passHash($algo = PASSWORD_DEFAULT, array $options = null) {
			//$this->password = password_hash($this->password, $algo);
			$this->password =  $this->password;
		}

		public function getErrors() {
			return $this->errors;
		}
	}