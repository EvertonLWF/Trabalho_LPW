<?php
require_once('../conexao.php');
include_once'../function.php';
if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0){
	$id= $_SESSION['id'];
	$r=listaPosts($id);
	if($r!=null){

	?>

	<div itemprop="breadcrumb">
		<a class="hiddenSpellError" href="../logout.php">Inicio</a> »
		<a class="hiddenSpellError" href="">Usuario</a>
	</div>
	<div class="sidebar-search">
		<form class="sidebar-search-form" action="busca.php" method="Post">
			<fieldset>
				<input type="text" size="30" id="busca" name="busca">
				<input type="submit" class="search-submit" value="Buscar">
			</fieldset>
		</form>
	</div>

	<table class="table">
		<h3 align="center">Meus Posts </h3>
		<thead>
			<tr>
				<th scope="col">Data</th>
				<th scope="col">Titulo</th>
				<th scope="col">Descrição</th>
				<th scope="col">Operações</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($r as $key) {
				$html= '<br><tr>
				<td>'.$key['data'].'</td>
				<td>'.$key['titulo'].'</td>
				<td>'.$key['descricao'].'</td>
				<td><a class="btn btn-success"href="editar.php?id_post='.$key['id_post'].'">Editar</a><td><a class="btn btn-danger"href="deletar.php?id_post='.$key['id_post'].'">Deletar</a>';
				echo $html;
			}

		}else{
			?>
		</tbody>
	</table>
	<div itemprop="breadcrumb">
		<a class="hiddenSpellError" href="../logout.php">Inicio</a> »
		<a class="hiddenSpellError" href="">Usuario</a>
	</div>
	<table class="table">
		<h3 align="center">Meus Posts </h3>
		<thead>
			<tr>
				<th scope="col">Data</th>
				<th scope="col">Titulo</th>
				<th scope="col">Descrição</th>
				<th scope="col">Operações</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>

	<?php } 
}
?>