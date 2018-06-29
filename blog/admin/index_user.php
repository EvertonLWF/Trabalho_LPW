<?php
	session_start();
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){

	$nome=$_SESSION['nome'];
	echo "Seja bem vindo ".$nome;
	require_once('../conexao.php');
	include_once'../function.php';
	$r=listAdmin(0);
	if($r != null){
?>
<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Administrador</a> »
</div>
<div class="sidebar-search">
 <form class="sidebar-search-form" action="busca.php" method="Post">
    <fieldset>
<input type="text" size="30" id="busca" name="busca">
<input type="submit" class="search-submit" value="Buscar">
    </fieldset>
 </form>
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
<?php }else{ ?>

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
</tbody>
</table>
<?php }
} ?>