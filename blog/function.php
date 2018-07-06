<?php 
function criaPost($id_user,$titulo,$desc,$data,$mark){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="INSERT INTO posts(id_user,titulo,descricao,data,id_categoria) VALUES ('".$id_user."','".$titulo."','".$desc."','".$data."','".$mark."')";
	$resultado=pg_query($consulta,$sql);
	$r=pg_affected_rows($resultado);
	return $r;
}
function nomeCategoria($var){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT nm_categoria FROM categoria WHERE id_categoria='".$var."'";
	$resultado=pg_query($consulta,$sql);
	$r=pg_fetch_assoc($resultado);
	return $r;

}
function listaPosts($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM posts WHERE id_user='".$id."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listaPostsTitulo($titulo){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT nome,posts.id_user,titulo,descricao,data,id_post FROM posts,usuarios WHERE descricao LIKE '%".$titulo."%'AND posts.id_user=usuarios.id_user";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listAdmin($tipo){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM usuarios WHERE tipo = '".$tipo."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listaUser($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM usuarios WHERE id_user='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$r=pg_fetch_all($resultado);
	return $r;
}

function Block($id,$ip){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE usuarios SET tipo = 2 WHERE id_user= '".$id."'OR ip_user = '".$ip."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_affected_rows($resultado)==1){
		$r="Sucesso";
	}else{
		$r="Falhou";
	}
	return $r;
}
function unlock($id,$ip){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE usuarios SET tipo = 0 WHERE id_user= '".$id."'OR ip_user='".$ip."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_affected_rows($resultado)==1){
		$r="Sucesso";
	}else{
		$r="Falhou";
	}
	return $r;
}
function exibePost($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT * FROM posts WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function listaPostsCategoria($id){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="SELECT nome,posts.id_user,titulo,descricao,data,id_post FROM posts,usuarios WHERE id_categoria='".$id."'AND posts.id_user=usuarios.id_user";
	$resultado = pg_query($consulta,$sql);
	if(pg_fetch_assoc($resultado)>0){
		$r=pg_fetch_all($resultado);
	}else{
		$r=null;
	}
	return $r;
}
function editaPost($id,$titulo,$desc,$data,$mark){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql="UPDATE posts SET titulo ='".$titulo."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$sql="UPDATE posts SET descricao ='".$desc."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$sql="UPDATE posts SET data ='".$data."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	$sql="UPDATE posts SET id_categoria ='".$mark."' WHERE id_post='".$id."'";
	$resultado = pg_query($consulta,$sql);
	
	if(pg_fetch_assoc($resultado)>0){
		return 1;
	}else{
		return 0;
	}
}
function cadastro($email,$senha,$nome,$tipo,$data,$ip){
	$consulta=pg_connect("host=localhost port=5432 dbname=blog user=postgres password=feijo62378");
	$sql = "SELECT email FROM usuarios WHERE email = '".$email."'";
	$resultado = pg_query($consulta,$sql);
	if(pg_num_rows($resultado)!=0){
		return "existe";
	}else{
		$sql = "SELECT ip_user FROM usuarios WHERE ip_user = '".$ip."'AND tipo=2";
		$resultado = pg_query($consulta,$sql);
		if(pg_num_rows($resultado)!=0){
			$sql="INSERT INTO usuarios(email,senha,nome,tipo,datanasc,ip_user) VALUES('".$email."','".$senha."','".$nome."','2','".$data."','".$ip."')";
			$resultado=pg_query($consulta,$sql);
			if(pg_affected_rows($resultado)==0){
				return "erro";
			}else{
				return "sucesso";
			}
		}else{
			$sql="INSERT INTO usuarios(email,senha,nome,tipo,datanasc,ip_user) VALUES('".$email."','".$senha."','".$nome."','".$tipo."','".$data."','".$ip."')";
			$resultado=pg_query($consulta,$sql);
			if(pg_affected_rows($resultado)==0){
				return "erro";
			}else{
				return "sucesso";
			}
		}

	}
}
function Page($categoria){
	?><!DOCTYPE html>
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
  <center>
     <br>
    <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="index.php"> Home</a></li>
				<li class="breadcrumb-item active" href= aria-current="page"><a class="btn btn-link"  value href="#"><?php echo $categoria['nm_categoria']; ?></a></li>
			</ol>
		</nav>
  </center>
  <?php } ?>
  <br>
  <div class="topo">
    <form action="admin/busca.php" method="POST">
      <div id="divBusca">
        <input type="text" id="txtBusca" name="tx" placeholder="Buscar..."/>
        <input  height="30px" type="image" src="img/botao.png" alt="Buscar..." id="btn2Busca"/>
      </div>
      </form>
    <br>
    

</div>

<?php
}


?>