<?php

	require_once("../conexao.php");
	$id_user= $_SESSION['id'];
	$sql="SELECT * FROM posts WHERE id_user='".$id_user"'"


?>