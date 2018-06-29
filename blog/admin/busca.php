<?php
	session_start();
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){

	$nome=$_SESSION['nome'];
	echo "Seja bem vindo ".$nome;
	require_once('../conexao.php');
?>
<div itemprop="breadcrumb">
      <a class="hiddenSpellError" href="../index.php">Inicio</a> »
      <a class="hiddenSpellError" href="index_user.php">Administrador</a> »
      <a class="hiddenSpellError" href="#" >Busca Consulta</a>
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
<a class="btn btn-Danger" href="../logout.php">Sair</a><br><br>

<?php
$busca = $_POST['busca'];
$r=listaPostsTitulo($busca);
if(isset($r)&&!empty($r)){


			foreach ($r as $key) { ?>
			
					<div align="center" style="background-color: lightblue;">
						<div class="content-center">
		       				<h1><?php echo $key['titulo'] ?></h1>
		       				<p><?php echo $key['descricao'] ?></p>
		       				<h5><?php echo "Criado em:";
		       				echo date("d-m-Y H:i",strtotime($key['data']));
		       				echo' ';
		       				echo "Autor:";
		       				echo " ";
		       				echo $key['nome'];?></h5>
		   				</div>
						
					</div>
		<?php }}else{
		?>
		<div align="center" style="background-color: lightblue;">
						<div class="content-center">
		       				<h1><?php echo "Nenhum resultado encontrado" ?></h1>
		       				<p><?php echo "...<br> " ?></p>
		       				<h5><?php echo "...<br>";
		       				echo "...<br>";
		       				echo " ...<br>"?></h5>
		   				</div>
						
					</div>

<?php	}}
 ?>