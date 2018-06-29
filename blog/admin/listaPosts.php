<?php
	session_start();
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){

	$nome=$_SESSION['nome'];
	echo "Seja bem vindo ".$nome;
	require_once('../conexao.php');
	include_once'../function.php';
?>
<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Administrador</a> »
      <a class="hiddenSpellError" href="">Lista de Posts</a>
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
<?php




	if(isset($_GET['id_user'])){
		$id= $_GET['id_user'];
	}else{
		$id= $_SESSION['id_user'];
	}
	$r=listaPosts($id);
	if($r!=null){
		?>
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
					<td><a class="btn btn-danger"href="deletar.php?id_post='.$key['id_post'].'&&id_user='.$key['id_user'].'">
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
			<?php }
}
?>

