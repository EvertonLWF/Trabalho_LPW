<?php
$id= $_GET['id'];
require_once('../conexao.php');
$sql="SELECT * FROM posts WHERE id_user='".$id."'";
$resultado = pg_query($consulta,$sql);
if(pg_fetch_assoc($resultado)>0){

	$r=pg_fetch_all($resultado);
	?>
	<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Administrador</a> »
      <a class="hiddenSpellError" href="listaPosts.php">Lista de Posts</a> »
</div>
	<table class="table">
		<h3 align="center">Posts do usuario </h3>
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
			<td><a class="btn btn-danger"href="deletar.php?id='.$key['id_post'].'&&'.$key['id_user'].'">
					Excluir</a>';
		echo $html;
	}
}else{
?>
<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Administrador</a> »
      <a class="hiddenSpellError" href="listaPosts.php">Lista de Posts</a> »
</div>
	<table class="table">
		<h3 align="center">Posts do usuario </h3>
		<thead>
			<tr>
			<th scope="col">Data</th>
			<th scope="col">Titulo</th>
			<th scope="col">Descrição</th>
			<th scope="col">Operações</th>
			</tr>
		</thead>
		<tbody>
<?php } ?>

