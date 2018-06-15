<?php

session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=root");
	if($consulta==true){
		echo "Conectado ao Banco de dados";
	}
	else{
		echo "Desconectado ";
	}









?>