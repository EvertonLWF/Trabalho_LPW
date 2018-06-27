<?php 
	require_once('../conexao.php');
	$id_post=$_GET['id'];
	$id_user=$_GET[17];
	var_dump($_GET);
	echo $id_post;
	echo $id_user;
	// if(isset($_GET['id'])&&!empty($_GET['id'])){
	// 	$sql="DELETE FROM posts WHERE id_post='".$id_post."'";
	// 	$res=pg_query($consulta,$sql);
	// 	header("location:listaPosts.php");
	// }

?>