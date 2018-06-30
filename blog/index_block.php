<?php
	require_once("conexao.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Novo Post</title>
</head>
<body>
	<div class="fundo">

		<div class="d-flex">
		</div>

		<nav class="navbar sticky-top" style="background-color: #696D7D;">
			<a class="navbar-brand" href="#">
				<img src="brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
			</a>
			<div class="alinha" class="text-center">
				<a class="btn btn-light" href="logout.php" role="button">Logout</a>
			</div>
		</nav>
		
		<hr>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index_user.php"> Home</a></li>
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"> Usuario Bloqueado</a></li>
			</ol>
		</nav>

		<center>
			<img src="Blocked.png" width="300" height="300">
			<h2>Você esta temporiariamente bloqueado</h2>
</center>
</div>


</body>
</html>