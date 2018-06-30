<?php 
	session_start();
	require_once('conexao.php');
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
		$id=$_GET['id'];
		$ip=$_GET['ip'];
		$r=Block($id,$ip);
		header("Location:index.php");
	}

 ?>