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
					<img src="../brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
				</a>
			<div class="alinha" class="text-center">
				<a class="btn btn-light" href="../logout.php" role="button">Logout</a>
				<a class="btn btn-light" href="index_user.php" role="button">Painel</a>
			</div>
			</nav>
		
			<hr>
			<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="../logout.php"> Home</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index_user.php"> Administrador</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="postsAdmin.php"> Posts Admin</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"> Novo Post</a></li>
				  </ol>
			</nav>

		<center>
			
			<div class="divCriaPost" class="text-center">
				<form action="new.php" method="post" accept-charset="utf-8">
					Título do Post<br><br>
					<input type="text" name="titulopost" class="form-control">
					<hr>
					Postagem<br><br>
					<textarea name="post" class="form-control" rows="10" cols="40" maxlength="500"></textarea>
					<hr>
					Categoria:
					<select name="marcador">
						<option value="1">Comida</option>
						<option value="2">Entertenimento</option>
						<option value="3">Futelol</option>
						<option value="4">Gastronomia</option>
						<option value="5">Tecnologia</option>
					</select>
					<hr>
					<button type="submit" class="btn btn-secondary btn-lg btn-block">Postar</button>
				</form>
			</div>
		</center>
	</div>


</body>
</html>