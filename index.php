<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');


$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = ucfirst($controller);
$controller .= 'Controller';
$path_controller = "controllers/$controller.php";
// echo $path_controller;

if (!file_exists($path_controller)) {
	die('Trang bạn tìm không tồn tại');
}

require_once "$path_controller";
$obj = new $controller();
if (!method_exists($obj, $action)) {
	die("Phương thức $action không tồn tại trong class $controller");
}
$obj->$action();

?>