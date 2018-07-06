<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<title>Editando Post</title>
</head>

<body>
	<div class="bg">

		<div class="d-flex">
		</div>

		<?php
		session_start();
		require_once("../conexao.php");
		$id_post=$_GET['id_post'];
		$r=exibePost($id_post);	
		if($r != null){
			?>
			<nav class="navbar sticky-top" style="background-color: #8fc0a9;">
				<a class="navbar-brand text-light">
					<img src="../brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Editar Postagem
				</a>
				<div class="justify-content-end">
					<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
					<a class="btn btn-light" href="index_user.php" role="button">Painel</a>
				</div>
			</nav>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a class="btn btn-link text-dark" value href="../logout.php">Home</a></li>
				<li class="breadcrumb-item"><a class="btn btn-link text-dark" value href="index_user.php">Meu Painel</a></li>
				<li class="breadcrumb-item active"><a class="btn btn-link text-black"  value href="#">Editando Post</a></li>
				</ol>
			</nav>
			<center>
				<div class="divCriaPost" class="text-center">
					<?php foreach ($r as $key) {
						 ?>
				<form action="editado.php" method="post" accept-charset="utf-8">
					Título do Post<br><br>
					<input type="hidden" name="id_post" value="<?php echo $key['id_post']?>">
					<input type="text" name="titulo" class="form-control" value="<?php echo $key['titulo']?>">
					<hr>
					Postagem<br><br>
					<textarea name="post" class="form-control" rows="10" cols="40" maxlength="500" ><?php echo $key['descricao']?></textarea>
					<hr>
					<select class="custom-select" name="marcador">
						<option selected>Escolha uma categoria</option>
						<option value="1">Esportes</option>
						<option value="2">Entretenimento</option>
						<option value="3">Moda/Beleza</option>
						<option value="4">Gastronomia</option>
						<option value="5">Tecnologia</option>
					</select>
					<hr>
					<button type="submit" class="btn btn-secondary btn-lg btn-block">Postar</button>
					<a class="btn btn-dark btn-lg btn-block" href="index_user.php" role="button">Cancelar</a>
					<?php } ?>
				</form>
			</div>
		</center>
	</div>



			</center>
		</div>


	</body>
	</html>

	<?php } ?>
