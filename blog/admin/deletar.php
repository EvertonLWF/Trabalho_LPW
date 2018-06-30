<?php 
	require_once('../conexao.php');
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
	$id_post=$_GET['id_post'];
	$id_user=$_GET['id_user'];
	$_SESSION['id_user']=$id_user;
	if(isset($_GET['id_post'])&&!empty($_GET['id_post'])){
		$sql="DELETE FROM posts WHERE id_post='".$id_post."'";
		$res=pg_query($consulta,$sql);

		header("location:postsAdmin.php");
	}else{
		echo "erro!!!!!!!!";
	}
}
?>