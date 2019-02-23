<?php

require_once "funcoes.php";

session_start();
session_destroy();

$id = "";
$login = "";
$senha = "";

?>

<html>
<head>
    <title> Login </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">

    
</head>
<body class="text-center">
    <form class="form-signin" action ="validarLogin.php" method ="POST">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>
      <label for="login" class="sr-only">Login </label>
      <input type="text" id="login" name ="login" class="form-control" placeholder="Login " value = "<?=$login?>" required autofocus>
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" id="senha" name ="senha" class="form-control" placeholder="Senha" value = "<?=$senha?>" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar-me
        </label>
      </div>
      <input class="btn btn-lg btn-primary btn-block" value= "Entrar" type="submit">
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body> 

</html>