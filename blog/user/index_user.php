<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Meu Painel</title>
</head>

<body>
	<div class="bg">

		<div class="d-flex">
		</div>

		<?php
		session_start();
		require_once('../conexao.php');
		if(!isset($_SESSION['tipo']) && $_SESSION['tipo'] != 0 && $_SESSION['tipo'] != 1){
			header("location:../index.php");
		}
		$nome=$_SESSION['nome'];
		$id= $_SESSION['id'];
		$r=listaPosts($id);
		if($r!=null){
			?>

			<nav class="navbar sticky-top" style="background-color: #8fc0a9;">
				<a class="navbar-brand text-light">
					<img src="../brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Meu Painel
				</a>
				<div class="justify-content-end">
					<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
				</div>
			</nav>

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="btn btn-link text-dark" value href="../logout.php">Home</a></li>
					<li class="breadcrumb-item active"><a class="btn btn-link text-black"  value href="#">Meu Painel</a></li>
				</ol>
			</nav>
			<nav class="navbar">
				<a class="btn btn-secondary" href="cria.php" role="button">Nova Postagem</a>
				<form class="form-inline justify-content-end" action="busca.php" method="POST">
					<input class="form-control mr-sm-2" type="search" name="txt" id="busca" placeholder="Pesquisa" aria-label="Search">
					<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
				</form>
			</nav>
			<center>
				<br>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Titulo</th>
							<th scope="col">Descrição</th>
							<th scope="col">Data</th>
							<th scope="col">Operações</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($r as $key) {
							$html= '<br><tr>
							
							<td>'.$key['titulo'].'</td>
							<td>'.$key['descricao'].'</td>
							<td>'.date("d-m-Y H:i",strtotime($key['data'])).'</td>
							<td><a class="btn btn-secondary"href="edita.php?id_post='.$key['id_post'].'">Editar</a>
							<a class="btn btn-dark"href="deleta.php?id_post='.$key['id_post'].'">Deletar</a></td>';
							echo $html;
						}
						?>
					</tbody>
				</table>
			</tbody>
		</table>
	</center>
</div>


</body>
</html>
<?php }else{ ?>
<nav class="navbar sticky-top" style="background-color: #8fc0a9;">
	<a class="navbar-brand text-light">
		<img src="../brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
		Meu Painel
	</a>
	<div class="justify-content-end">
		<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
	</div>
</nav>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a class="btn btn-link text-dark" value href="../logout.php">Home</a></li>
		<li class="breadcrumb-item active"><a class="btn btn-link text-black"  value href="#">Meu Painel</a></li>
	</ol>
</nav>

<nav class="navbar">
	<a class="btn btn-secondary" href="cria.php" role="button">Nova Postagem</a>
	<form class="form-inline justify-content-end" action="busca.php" method="POST">
		<input class="form-control mr-sm-2" type="search" name="txt" id="busca" placeholder="Pesquisa" aria-label="Search">
		<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
	</form>
</nav>

<center>
	<br>

	<table class="table">
		<thead>
			<tr>
				<th scope="col">Título</th>
				<th scope="col">Descrição</th>
				<th scope="col">Data</th>
				<th scope="col">Operações</th>
			</tr>
		</thead>
		<tbody>
			<br>
		</tbody>
	</table>
</tbody>
</table>
</center>
</div>


</body>
</html>
<?php } ?>
