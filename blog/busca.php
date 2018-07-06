<?php
require_once('conexao.php');
?>
<meta charset=utf-8>
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Consulta</title>

<?php
$busca = $_POST['tx'];
$r=listaPostsTitulo($busca);
if(isset($r)&&!empty($r)){

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script language="javascript" type="text/javascript">
			<?php
			session_start();
			require_once('conexao.php');
			$ip = $_SERVER['REMOTE_ADDR'];
			if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
				if($_SESSION['tipo']==1){
					header("Location:admin/index_user.php");
				}
				if($_SESSION['tipo']==0){
					header("Location:user/index_user.php");
				}
				if($_SESSION['tipo']==2){
					header("Location:index_block.php");
					?>
				</script>
				<nav class="navbar navbar-default navbar-static-top" style="background-color: #696D7D;">
					<a class="navbar-brand" href="#">
						<img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					</a>

					<div class="d-flex">
					</div>

					<div class="alinha" class="text-center">

					</div>
					<script language="javascript" type="text/javascript">
						<?php
					}

				}else{
					?>

					function validarlogin() {
						var email = form2.email.value;
						var senha = form2.senha.value;
						if(email == "" || email.indexOf('@') == -1){
							alert('Preencha o campo com seu e-mail')
							form2.email.focus();
							return false;
						}
						if(senha == ""){
							alert('Preencha o campo com sua senha')
							form2.senha.focus();
							return false;
						}
					};
					function validarcadastro() {
						var nome = form1.nome.value;
						var email = form1.email.value;
						var dtnasc = form1.dtnasc.value;
						var senha = form1.senha.value;
						if(nome == ""){
							alert('Preencha o campo com seu nome.')
							form1.nome.focus();
							return false;
						}
						if(email == "" || email.indexOf('@') == -1){
							alert('Preencha o campo com seu e-mail.')
							form1.email.focus();
							return false;
						}
						if(senha == "" || senha.length < 6){
							alert('Preencha o campo senha com no mínimo 6 caracteres.')
							form1.email.focus();
							return false;
						}
					};
				</script>

				<title></title>
			</head>
			<body> 

				<nav class="navbar navbar-default navbar-static-top" style="background-color: #696D7D;">
					<a class="navbar-brand" href="#">
						<img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
					</a>

					<div class="d-flex">
					</div>

					<div class="alinha" class="text-center">
						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#cadastro">
							Cadastre-se
						</button>

						<button type="button" class="btn btn-light" data-toggle="modal" data-target="#login">
							Login
						</button>
						<!-- Modal -->
						<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body" class="text-center">
										<form action="cadastro.php" method="post" name="form1" >
											<input type="hidden" name="ip" value="<?php echo $ip;?>">
											Nome Completo<br>
											<input type="text" name="nome" class="form-control"><br>
											E-mail<br>
											<input type="email" name="email" class="form-control"><br>
											Data de Nascimento<br>
											<input type="date" name="dtnasc" class="form-control"><br>
											Senha<br>
											<input type="password" name="senha" class="form-control"><br><br>
											<br>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												<button type="reset" class="btn btn-primary">Limpar</button>
												<button type="submit" class="btn btn-primary" onclick="return validarcadastro();">Cadastrar</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
						<!-- Modal do Login -->

						<!-- Modal -->
						<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Login</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body" class="text-center">
										<form action="login.php" method="post" name="form2" >
											Email: <input type="email" name="email" class="form-control"><br>
											Senha: <input type="password" name="senha" class="form-control">
											<br>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
												<button type="submit" class="btn btn-primary" onclick="return validarlogin();">Logar</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</nav>
				<?php } ?>
				<br>
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index.php"> Home</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"> Consulta</a></li>
				</ol>
			</nav>
				<br>
				<div class="topo">
					<form action="busca.php" method="POST">
						<div id="divBusca">
							<input type="text" id="txtBusca" name="tx" placeholder="Buscar..."/>
							<input  height="30px" type="image" src="img/botao.png" alt="Buscar..." id="btn2Busca"/>
						</div>
					</form>
				</div>
				<br>

			</div>

		</body>
	</body>
</nav>
</head>
</html>

<?php


foreach ($r as $key) { ?>

<div align="center" style="background-color: #c8d5b9;">
	<div class="content-center">
		<h1><?php echo $key['titulo'] ?></h1>
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
<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script language="javascript" type="text/javascript">
		<?php
		session_start();
		require_once('conexao.php');
		$ip = $_SERVER['REMOTE_ADDR'];
		if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
			if($_SESSION['tipo']==1){
				header("Location:admin/index_user.php");
			}
			if($_SESSION['tipo']==0){
				header("Location:user/index_user.php");
			}
			if($_SESSION['tipo']==2){
				header("Location:index_block.php");
				?>
			</script>
			<nav class="navbar navbar-default navbar-static-top" style="background-color: #696D7D;">
				<a class="navbar-brand" href="#">
					<img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
				</a>

				<div class="d-flex">
				</div>

				<div class="alinha" class="text-center">

				</div>
				<script language="javascript" type="text/javascript">
					<?php
				}

			}else{
				?>

				function validarlogin() {
					var email = form2.email.value;
					var senha = form2.senha.value;
					if(email == "" || email.indexOf('@') == -1){
						alert('Preencha o campo com seu e-mail')
						form2.email.focus();
						return false;
					}
					if(senha == ""){
						alert('Preencha o campo com sua senha')
						form2.senha.focus();
						return false;
					}
				};
				function validarcadastro() {
					var nome = form1.nome.value;
					var email = form1.email.value;
					var dtnasc = form1.dtnasc.value;
					var senha = form1.senha.value;
					if(nome == ""){
						alert('Preencha o campo com seu nome.')
						form1.nome.focus();
						return false;
					}
					if(email == "" || email.indexOf('@') == -1){
						alert('Preencha o campo com seu e-mail.')
						form1.email.focus();
						return false;
					}
					if(senha == "" || senha.length < 6){
						alert('Preencha o campo senha com no mínimo 6 caracteres.')
						form1.email.focus();
						return false;
					}
				};
			</script>

			<title></title>
		</head>
		<body> 

			<nav class="navbar navbar-default navbar-static-top" style="background-color: #696D7D;">
				<a class="navbar-brand" href="#">
					<img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
				</a>

				<div class="d-flex">
				</div>

				<div class="alinha" class="text-center">
					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#cadastro">
						Cadastre-se
					</button>

					<button type="button" class="btn btn-light" data-toggle="modal" data-target="#login">
						Login
					</button>
					<!-- Modal -->
					<div class="modal fade" id="cadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" class="text-center">
									<form action="cadastro.php" method="post" name="form1" >
										<input type="hidden" name="ip" value="<?php echo $ip;?>">
										Nome Completo<br>
										<input type="text" name="nome" class="form-control"><br>
										E-mail<br>
										<input type="email" name="email" class="form-control"><br>
										Data de Nascimento<br>
										<input type="date" name="dtnasc" class="form-control"><br>
										Senha<br>
										<input type="password" name="senha" class="form-control"><br><br>
										<br>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											<button type="reset" class="btn btn-primary">Limpar</button>
											<button type="submit" class="btn btn-primary" onclick="return validarcadastro();">Cadastrar</button>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
					<!-- Modal do Login -->

					<!-- Modal -->
					<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Login</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" class="text-center">
									<form action="login.php" method="post" name="form2" >
										Email: <input type="email" name="email" class="form-control"><br>
										Senha: <input type="password" name="senha" class="form-control">
										<br>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											<button type="submit" class="btn btn-primary" onclick="return validarlogin();">Logar</button>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</nav>
			<?php } ?>
			<br>
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index.php"> Home</a></li>
					<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"> Consulta</a></li>
				</ol>
			</nav>
				<br>
			<br>
			<div class="topo">
				<form action="busca.php" method="POST">
					<div id="divBusca">
						<input type="text" id="txtBusca" name="tx" placeholder="Buscar..."/>
						<input  height="30px" type="image" src="img/botao.png" alt="Buscar..." id="btn2Busca"/>
					</div>
				</form>
			</div>

		</div>

	</body>
</body>
</nav>
</head>
</html>





<?php }?>