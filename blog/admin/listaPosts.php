<?php
session_start();
if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1){

	$nome=$_SESSION['nome'];
	
	require_once('../conexao.php');
	include_once'../function.php';
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset=utf-8>
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>Novo Post</title>
	</head>
	<body>
		<div class="fundo">

			<div class="d-flex">
			</div>



			<nav class="navbar sticky-top" style="background-color: #696D7D;">
				<a class="navbar-brand" href="#">
					<img src="../img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					<?php echo "Seja bem vindo Administrador"; ?>
				</a>
				<div class="alinha" class="text-center">
					<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
					<a class="btn btn-light" href="postsAdmin.php" role="button">Painel</a>
				</div>
			</nav>

			<hr>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link" href="../logout.php"> Home</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link" href="index_user.php"> Administrador</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link" href=""> Post usuarios</a></li>
				</ol>
			</nav>

			<center>
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
								<td><a class="btn btn-danger"href="deletar_p_user.php?id_post='.$key['id_post'].'&&id_user='.$key['id_user'].'">
								Excluir</a>';
								echo $html;
							}
						}else{
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
									<?php }
								}
								?>
							</tbody>
						</table>





					</center>
				</div>


			</body>
			</html>