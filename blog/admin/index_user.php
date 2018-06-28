<?php
session_start();
$nome=$_SESSION['nome'];
echo $nome;
require_once('../conexao.php');
$sql="SELECT * FROM usuarios WHERE tipo = 0";
$resultado = pg_query($consulta,$sql);
$r=pg_fetch_all($resultado);
?>
<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Administrador</a> »
</div>


<a class="btn btn-Success" href="criar.php">Criar Post</a>
<a class="btn btn-Success" href="editar.php">Editar Post</a>
<a class="btn btn-Success" href="deletar.php">Deletar Post</a>
<a class="btn btn-Danger" href="../logout.php">Sair</a>

<table class="table">
	<h3 align="center">Usuários cadastrados</h3>
	<thead>
		<tr>
		<th scope="col">id</th>
		<th scope="col">Nome</th>
		<th scope="col">Email</th>
		<th scope="col">Operações</th>
		</tr>
	</thead>
	<tbody>
		<?php
foreach ($r as $key) {
	$html= '<br><tr>
		<td>'.$key['id_user'].'</td>
		<td>'.$key['nome'].'</td>
		<td>'.$key['email'].'</td>
		<td><a class="btn btn-danger"href="index_user.php?id='.$key['id_user'].'">
				Bloquear</a>
		<a class="btn btn-success"href="listaPosts.php?id_user='.$key['id_user'].'">
				Posts</a></td></tr>';
	echo $html;
}
?>
</tbody>
</table>
