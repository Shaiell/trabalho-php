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
$acao = "";

if(!empty($_GET)){
  $id = $_GET['id'];
  $acao = $_GET['acao'];

  if($acao == 'alterar'){
    $vendedor = buscarVendedor($id);
    $nome = $vendedor['nome'];
    $email = $vendedor['email'];
    $cpf = $vendedor['cpf'];
    $rg = $vendedor['rg'];
    $idade = $vendedor['idade'];
    $endereco = $vendedor['endereco'];
    $cidade = $vendedor['cidade'];
    $estado_id = $vendedor['estado_id'];
    $cep = $vendedor['cep'];
  }

  if($acao == 'excluir'){
    excluirVendedor($id);
  }
}

if(!empty($_POST)) {
  if (empty($_POST['id'])) {
      salvarVendedor($_POST);
  } else {
      editarVendedor($_POST);
  }
}

$vendedores = listarVendedores();

?>
<html>
<head>
    <title> Cadastro vendedores </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Vendedores </h1>
<br>
<br>
<form action ="vendedor.php" method ="POST" enctype= "multipart/form-data">

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
      <th> &nbsp; </th>
      <th> &nbsp; </th>
    </tr>
    </thead>
    <?php
      foreach ($vendedores as $vendedor){
    ?>      
    <tr>
      <td><?=$vendedor["id"]?></td>
      <td><?=$vendedor["nome"]?></td>
      <td><?=$vendedor["email"]?></td>
      <td><?=$vendedor["cpf"]?></td>
      <td><?=$vendedor["rg"]?></td>
      <td><?=$vendedor["idade"]?></td>
      <td><?=$vendedor["endereco"]?></td>
      <td><?=$vendedor["cidade"]?></td>
      <td><?=$vendedor["estado_id"]?></td>
      <td><?=$vendedor["cep"]?></td>
      <td><a class = "btn btn-outline-secondary" href = "vendedor.php?acao=alterar&id=<?=$vendedor['id']?>" >Alterar</a></td>
      <td><a class = "btn btn-outline-secondary" href = "cdVendedor.php?acao=excluir&id=<?=$vendedor['id']?>" onclick="return confirm ('Você tem certeza disto?')">Excluir</a></td>
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