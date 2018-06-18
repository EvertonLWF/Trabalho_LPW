<?php
require_once ('conexao.php');
if(!isset($_SESSION['id'])&&empty($_SESSION['id'])){
	if(isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['nome'])&&!empty($_POST['nome'])&&isset($_POST['senha'])&&!empty($_POST['senha'])){
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$query = ("INSERT INTO usuarios(email,senha,nome) VALUES('$email','$senha','$nome')");
			$res = pg_query($consulta , $query);
			$query = ("SELECT * FROM usuarios WHERE email='$email'");
			$res=pg_query($consulta,$query);
			if(pg_num_rows($res)>0){
				header("location:index.php");
			}

	}
?>
		<form action="cadastro.php" method="POST">
			Digite seu e-mail:
			<input type="email" name="email">
			Digite sua senha:
			<input type="password" name="senha">
			Digite seu nome:
			<input type="nome" name="nome">
			<input type="submit" value="Cadastrar">
		</form>
	<?php
}

?>
