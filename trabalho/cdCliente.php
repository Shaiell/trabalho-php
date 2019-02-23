<?php

require_once 'funcoes.php';

session_start();

if(empty($_SESSION['master'])){
   header("Location: login.php");
}


$id = "";
$nome = "";
$email = "";
$cpf = "";
$rg = "";
$idade = "";
$endereco = "";
$cidade = "";
$estado_id = "";
$cep = "";
$login = "";
$senha = "";
$acao = "";

if(!empty($_GET)){
  $id = $_GET['id'];
  $acao = $_GET['acao'];

  if($acao == 'alterar'){
    $cliente = buscarCliente($id);
    $nome = $cliente['nome'];
    $email = $cliente['email'];
    $cpf = $cliente['cpf'];
    $rg = $cliente['rg'];
    $idade = $cliente['idade'];
    $endereco = $cliente['endereco'];
    $cidade = $cliente['cidade'];
    $estado_id = $cliente['estado_id'];
    $cep = $cliente['cep'];
    $login = $cliente['login'];
    $senha = $cliente['senha'];
  }

  if($acao == 'excluir'){
    excluirCliente($id);
  }
}

if(!empty($_POST)) {
  if (empty($_POST['id'])) {
      salvarCliente($_POST);
  } else {
      editarCliente($_POST);
  }
}

$clientes = listarClientes();

?>
<html>
<head>
    <title> Cadastro clientes </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Clientes </h1>
<br>
<br>
<form action ="cliente.php" method ="POST" enctype= "multipart/form-data">

</form>
<table class = "table">
<thead class="thead-light">
    <tr>
      <th> ID </th>
      <th> NOME </th>
      <th> EMAIL </th>
      <th> CPF </th>
      <th> RG </th>
      <th> IDADE </th>
      <th> ENDEREÇO </th>
      <th> CIDADE </th>
      <th> ESTADO </th>
      <th> CEP </th>
      <th> LOGIN </th>
      <th> SENHA </th>
      <th> &nbsp; </th>
      <th> &nbsp; </th>
    </tr>
    </thead>
    <?php
      foreach ($clientes as $cliente){
    ?>      
    <tr>
      <td><?=$cliente["id"]?></td>
      <td><?=$cliente["nome"]?></td>
      <td><?=$cliente["email"]?></td>
      <td><?=$cliente["cpf"]?></td>
      <td><?=$cliente["rg"]?></td>
      <td><?=$cliente["idade"]?></td>
      <td><?=$cliente["endereco"]?></td>
      <td><?=$cliente["cidade"]?></td>
      <td><?=$cliente["estado_id"]?></td>
      <td><?=$cliente["cep"]?></td>
      <td><?=$cliente["login"]?></td>
      <td><?=$cliente["senha"]?></td>
      <td><a class = "btn btn-outline-secondary" href = "cliente.php?acao=alterar&id=<?=$cliente['id']?>" >Alterar</a></td>
      <td><a class = "btn btn-outline-secondary" href = "cdCliente.php?acao=excluir&id=<?=$cliente['id']?>" onclick="return confirm ('Você tem certeza disto?')">Excluir</a></td>
    </tr>
    <?php
      }
    ?> 
</table>

</main>

 <?php   
 include_once("footer.php");    
?> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
</body> 

</html>