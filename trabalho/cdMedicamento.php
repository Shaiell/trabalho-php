<?php

require_once 'funcoes.php';

session_start();

if(empty($_SESSION['master'])){
   header("Location: login.php");
}

$id = "";
$nome = "";
$lote = "";
$dtFabricacao = "";
$dtValidade = "";
$valor = "";
$imagem = "";
$acao = "";

if(isset($_FILES['imagem'])){
    $extensao = strtolower(substr($_FILES['imagem']['name'], - 4));
    $novoNome = md5(time()) .$extensao;
    $diretorio = "img/";
    move_uploaded_file($_FILES['imagem']['tmp_name'],$diretorio.$novoNome);
    $imagem = $diretorio.$novoNome;
    $_POST['imagem'] = $imagem;
}

if(!empty($_GET)){
    $id = $_GET['id'];
    $acao = $_GET['acao'];
  
    if($acao == 'alterar'){
      $medicamento = buscarMedicamento($id);
      $nome = $medicamento['nome'];
      $lote = $medicamento['lote'];
      $dtFabricacao = $medicamento['dtFabricacao'];
      $dtValidade = $medicamento['dtValidade'];
      $valor = $medicamento['valor'];
      $imagem = $medicamento['imagem'];
    }
  
    if($acao == 'excluir'){
      excluirMedicamento($id);
    }
  }
  
  if(!empty($_POST)) {
    if (empty($_POST['id'])) {
        salvarMedicamento($_POST);
    } else {
        editarMedicamento($_POST);
    }
  }
  
  $medicamentos = listarMedicamentos();


?>
<html>
<head>
    <title> Cadastro medicamentos </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Medicamento </h1>
<br>
<br>
<form action ="medicamento.php" method ="POST" enctype= "multipart/form-data">

</form>
<table class = "table">
<thead class="thead-light">
    <tr>
      <th> ID </th>
      <th> NOME </th>
      <th> LOTE </th>
      <th> DT FABRICAÇÃO </th>
      <th> DT VALIDADE </th>
      <th> VALOR </th>
      <th> IMAGEM </th>
      <th> &nbsp; </th>
      <th> &nbsp; </th>
    </tr>
    </thead>
    <?php
      foreach ($medicamentos as $medicamento){
    ?>      
    <tr>
      <td><?=$medicamento["id"]?></td>
      <td><?=$medicamento["nome"]?></td>
      <td><?=$medicamento["lote"]?></td>
      <td><?=$medicamento["dtFabricacao"]?></td>
      <td><?=$medicamento["dtValidade"]?></td>
      <td><?=$medicamento["valor"]?></td>
      <td><img src ="<?=$medicamento["imagem"]?>" alt="" width="72" height="72"></td>
      <td><a class = "btn btn-outline-secondary" href = "medicamento.php?acao=alterar&id=<?=$medicamento['id']?>" >Alterar</a></td>
      <td><a class = "btn btn-outline-secondary" href = "cdMedicamento.php?acao=excluir&id=<?=$medicamento['id']?>" onclick="return confirm ('Você tem certeza disto?')">Excluir</a></td>
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