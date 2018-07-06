<?php
session_start();
require_once ('conexao.php');
if(!isset($_SESSION['id'])&&empty($_SESSION['id'])){
	if(isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['nome'])&&!empty($_POST['nome'])&&isset($_POST['senha'])&&!empty($_POST['senha'])){
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$dataNasc = $_POST['dtnasc'];
			$ip = $_POST['ip'];
			$tipo=0;
			$r=cadastro($email,$senha,$nome,$tipo,$dataNasc,$ip);
			if($r=="sucesso"){
				header("location:index.php");
			}else{
				if($r=="existe"){
					?>
						<script type="text/javascript">
							
							alert("Email invalido");
							history.go(-1);
							
						</script>



					<?php
				}
			}
			

	}
?>
	<?php
}

?>
