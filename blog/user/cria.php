<?php
require_once('../conexao.php');
		$titulo 	= $_POST['titulo'];
		$descricao 	= $_POST['descricao'];
		$data 		= $_POST['data'];
		
		
		$sql = "INSERT into posts (titulo,descricao,data) VALUES ('$titulo','$descricao','$data')";	
		$query = mysqli_query($consulta , $sql);
		echo $sql;		

		if($query){
			echo "DEu";
			die;
			if(mysqli_affected_rows($query) != 0){
				header('Location: index.php');
			}
		}else{
			echo "Erro";
			die;
		}
?>
