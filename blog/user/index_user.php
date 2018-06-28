	<div><form  action="../logout.php"><button class="btn btn-primary" type="input">Logout</button></form></div>

<?php
require_once('../conexao.php');

if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0){
	$id= $_SESSION['id'];

$sql="SELECT * FROM posts WHERE id_user='".$id."'";
$resultado = pg_query($consulta,$sql);
if(pg_fetch_assoc($resultado)>0){
echo "string";
	$r=pg_fetch_all($resultado);
	?>
	<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Usuario</a> »
      <a class="hiddenSpellError" href="listaPosts.php">Lista de Posts</a> »
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
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Usuario</a> »
      <a class="hiddenSpellError" href="listaPosts.php">Lista de Posts</a> »
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

}?>