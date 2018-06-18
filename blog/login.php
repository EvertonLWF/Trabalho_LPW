<?php
require_once ('conexao.php');
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT id_user,nome FROM usuarios WHERE email='".$email."' "AND" senha='".$senha."'";
$res = pg_query($consulta , $sql);
if(pg_num_rows ($res) > 0){
	$dados = pg_fetch_assoc($res);
	echo var_dump($dados);
    $_SESSION['id'] = $dados['id_user'];
	$_SESSION['nome'] = $dados['nome'];
    header("Location:index.php");
} else{
	header("Location:cadastro.php");
}
echo $_SESSION['nome'];
echo "<br/>";
echo '<a href="logout.php">Encerrar sessao</a>';

?>
