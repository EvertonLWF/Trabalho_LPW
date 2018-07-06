<?php
session_start();
require_once('../conexao.php');
if(!isset($_SESSION['tipo']) && $_SESSION['tipo'] != 0 && $_SESSION['tipo'] != 1){
	header("location:../index.php");
}
$nome=$_SESSION['nome'];
?>


<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Pesquisa</title>

<?php
$busca = $_POST['tx'];
$r=listaPostsTitulo($busca);
if(isset($r)&&!empty($r)){
	?>
	<body>
		<div class="bg">

			<div class="d-flex">
			</div>

			<nav class="navbar sticky-top" style="background-color: #8fc0a9;">
				<a class="navbar-brand text-light">
					<img src="../brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
				</a>
				<div class="justify-content-end">
					<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
					<a class="btn btn-light" href="index_user.php" role="button">Painel</a>
				</div>
			</nav>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a class="btn btn-link text-dark"  value href="../logout.php">Home</a></li>
					<li class="breadcrumb-item active"><a class="btn btn-link text-dark"  value href="index_user.php">Meu Painel</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#">Pesquisando</a></li>
				</ol>
			</nav>
			<nav class="navbar justify-content-end">
				<form class="form-inline justify-content-end" action="busca.php" method="POST">
					<input class="form-control mr-sm-2" type="search" name="txt" id="busca" placeholder="Pesquisa" aria-label="Search">
					<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
				</form>
			</nav>
			<center>
				<br>
				<table class="table">

					<tbody>

						<?php
						foreach ($r as $key) { ?>

						<div align="center" style="background-color: #8fc0a94f;">
							<div class="content-center">
								<h3><?php echo $key['titulo'] ?></h3>
								<p><?php echo $key['descricao'] ?></p>
								<h5><?php echo "Criado em: ";
								echo date("d-m-Y H:i",strtotime($key['data']));
								echo' ';
								echo "Autor:";
								echo " ";
								echo $key['nome'];?></h5>
							</div>

						</div><?php } ?>
					</tbody>
				</table>
			</center>
		</div>
		<?php }else{ ?>
		<div class="fundo">
			<nav class="navbar sticky-top" style="background-color: #696D7D;">
				<a class="navbar-brand" href="#">
					<img src="../img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					<?php  echo "Seja bem vindo ".$nome;?>
				</a>
				<div class="alinha" class="text-center">
					<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
					<a class="btn btn-light" href="cria.php" role="button">Novo post</a>
				</div>
			</nav>

			<hr>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="../logout.php"> Home</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index_user.php"> Usuario</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"> Usuario Busca</a></li>
				</ol>
			</nav>
			<center>
				<form action="busca.php" method="POST">
					<div id="divBusca">
						<input type="text" id="txtBusca" name="tx" placeholder="Buscar..."/>
						<input  height="30px" type="image" src="../img/botao.png" alt="Buscar..." id="btn2Busca"/>
					</div>
				</form>
				<br>

				<table class="table">

					<tbody>

					</tbody>
				</table>
			</tbody>
		</table>
	</center>
</div>
</div>
</body>
</html>
<?php }?>
