<?php 
	session_start();
	require_once('conexao.php');
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
		$id=$_GET['id'];
		$ip=$_GET['ip'];
		$r=unlock($id,$ip);
		header("Location:index.php");
	}

 ?>