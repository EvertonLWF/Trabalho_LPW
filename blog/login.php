<?php
session_start();
require_once ('conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='".$email."' AND  senha='".$senha."'";
$res = pg_query($consulta , $sql);
if(pg_num_rows ($res) > 0){
	$dados = pg_fetch_assoc($res);
	$_SESSION['id'] = $dados['id_user'];
	$_SESSION['nome'] = $dados['nome'];
	$_SESSION['tipo'] = $dados['tipo'];

	header("location:index.php");
}else{
	?>
	<script type="text/javascript">

		alert("Senha ou email invalido");
		history.go(-1);

	</script>
	<?php
} 


?>
