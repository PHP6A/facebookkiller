<?php
Class Controller
{
public function login(){
	include 'views/index.html';
}
public function reg(){
	include 'views/registration.html';
}
public function contact($id){
	echo $id;
}
public function about(){
	//echo "о нас";
	//$m = new Model; //получение модели
	//$data = $m -> get_data();//получили данные записали в перемменную
	$data = new Model;
	$res = $data->get_data();
	include 'about.php';
}
public function error404(){
	echo "error 404 Ошибка";
}
}
?>