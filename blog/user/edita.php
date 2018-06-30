

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
		require_once("../conexao.php");
		$id_post=$_GET['id_post'];
		$r=exibePost($id_post);	
		if($r != null){
			?>
			<nav class="navbar sticky-top" style="background-color: #696D7D;">
				<a class="navbar-brand" href="#">
					<img src="../brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					<?php  echo "Seja bem vindo ".$_SESSION['nome'];?>
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
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"> Editar</a></li>
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
					<input type="text" name="marcador" class="form-control" placeholder="Marcador"value="<?php echo $key['categoria']?>">
					<hr>
					<button type="submit" class="btn btn-secondary btn-lg btn-block">Postar</button>
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