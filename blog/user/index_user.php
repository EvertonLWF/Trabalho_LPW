

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
			</ol>
		</nav>

		<center>
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
						<td><a class="btn btn-success"href="edita.php?id_post='.$key['id_post'].'">Editar</a>
						<a class="btn btn-danger"href="deleta.php?id_post='.$key['id_post'].'">Deletar</a></td>';
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

<nav class="navbar sticky-top" style="background-color: #696D7D;">
			<a class="navbar-brand" href="#">
				<img src="../img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
			</ol>
		</nav>

		<center>
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