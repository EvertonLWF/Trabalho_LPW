<?php 
  require_once("conexao.php");
  echo "teste cabecalho OK<br>";
  if(isset($_SESSION['nome'])){
            echo "<br>Seja bem vindo ";
            echo $_SESSION['nome'];
            ?>  <div><form  action="logout.php"><button type="input">Logout</button></form></div> <?php

  }else{
?>
<form action="login.php" method="POST">
  Digite seu e-mail:
  <input type="email" name="email">
  Digite sua senha:
  <input type="password" name="senha">
  <input type="submit" value="login">
</form>
<form action="cadastro.php">
    <button type="input">Cadastro</button>
</form>

<?php }?>



<fieldset>
  <h4>
    Espaço reservado para marcadores!!!!
  </h4>
</fieldset>
<br>
<form action="busca.php" method="post">
  <label for="busca">Buscar</label>
  <input align="center" size="100" type="search" id="busca" name="q">
  <button type="submit">OK</button>
</form>
