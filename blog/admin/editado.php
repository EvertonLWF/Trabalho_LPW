<?php
session_start();
require_once("../conexao.php");
if(isset($_SESSION['tipo'])&& !empty($_SESSION)){
	$titulo=$_POST['titulo'];
	$post=$_POST['post'];
	$mark=$_POST['marcador'];
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('Y-m-d H:i');
	$id_post = $_POST['id_post'];
	$r=editaPost($id_post,$titulo,$post,$date,$mark);


	header("location: postsAdmin.php");
}else{
	header("location: ../index.php");
}
?>