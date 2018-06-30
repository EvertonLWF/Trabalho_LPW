<?php
	include_once'function.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");//banco com postgres
// 	$consulta=mysqli_connect("host=localhost port=5432 dbname=blog user=root");// banco com mysql
	if($consulta==!true){
		echo "Falha ao conectar o banco de dados";
	}else{
		?><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"><?php
	}
?>
