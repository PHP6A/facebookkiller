<?php
$uri = $_SERVER['REQUEST_URI'];
$uriexplode = explode('/', $uri);
$controller = $uriexplode[2];

$uri = str_replace('/mvc4/' . $controller . '/','',$uri);

include 'Model.php';
include $controller . '.php';//можно использовать require 'Controller.php'
$c = new $controller;
if($uri == ""){
	$uri = 'login';
}

if(!method_exists($c, $uri))//проверяем есть ли метод в контроллере
{
	$uri = 'error404'; // можно записать $c -> error404();
}

$c->$uri($uriexplode[4]);
?>