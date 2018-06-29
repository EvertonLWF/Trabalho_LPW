<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">


	<title></title>
</head>
<body> 

<nav class="navbar navbar-default navbar-static-top" style="background-color: #696D7D;">
  <a class="navbar-brand" href="#">
    <img src="brand.png" width="30" height="30" class="d-inline-block align-top" alt="">
  </a>

  <div class="d-flex">
  </div>

  <div class="alinha" class="text-center">
      <a href="novo.php" class="btn btn-light" role="button">Cadastrar</a>
    
  <!-- Button trigger modal -->
      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#login">
        Login
      </button>
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
             <form action="login.php" method="post">
              Email: <input type="email" name="email" class="form-control"><br>
              Senha: <input type="password" name="senha" class="form-control">
             </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-primary">Logar</button>
            </div>
          </div>
        </div>
      </div>
  </div>
</nav>
