<?php 
	session_start();
	require_once('../conexao.php');
	
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){
		$titulo =$_POST['titulopost'];
		$desc =$_POST['post'];
		$mark =$_POST['marcador'];
		$id= $_SESSION['id']; 
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i');
		$r=criapost($id,$titulo,$desc,$date,$mark);
		if($r == 1){
			header("location:postsAdmin.php");
		}
		else{
			echo "erro ";
		}

	}else{
		header("location:cria.php");
	}


?>