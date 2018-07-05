<?php 
require_once("../conexao.php");

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
			</a>
			<div class="alinha" class="text-center">
				<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
				<a class="btn btn-light" href="postsAdmin.php" role="button">Painel</a>
			</div>
		</nav>
		
		<hr>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="../logout.php"> Home</a></li>
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index_user.php"> Administrador</a></li>
			</ol>
		</nav>

		<center>
			

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

					$r=listAdmin(0);	
					if($r != null ){

					foreach ($r as $key) {
					$html= '<br><tr>
						<td>'.$key['id_user'].'</td>
						<td>'.$key['nome'].'</td>
						<td>'.$key['email'].'</td>
						<td><a class="btn btn-danger"href="../block.php?id='.$key['id_user'].'&&ip='.$key['ip_user'].'">
						Bloquear</a>
						<a class="btn btn-success"href="listaPosts.php?id_user='.$key['id_user'].'">
						Posts</a></td></tr>';
						echo $html;
					}

				}
				$r2=listAdmin(2);
				if($r2 != null ){
				foreach ($r2 as $key) {
				$html= '<br><tr>
					<td>'.$key['id_user'].'</td>
					<td>'.$key['nome'].'</td>
					<td>'.$key['email'].'</td>
					<td><a class="btn btn-warning"href="../unlock.php?id='.$key['id_user'].'&&ip='.$key['ip_user'].'">
					Desbloq.</a>
					<a class="btn btn-success"href="listaPosts.php?id_user='.$key['id_user'].'">
					Posts</a></td></tr>';
					echo $html;
				}
			}
			?>
		</tbody>
	</table>


	


</center>
</div>


</body>
</html>