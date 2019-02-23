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
$crm = "";
$especialidade = "";
$endereco = "";
$cidade = "";
$estado_id = "";
$cep = "";
$acao = "";

if(!empty($_GET)){
  $id = $_GET['id'];
  $acao = $_GET['acao'];

  if($acao == 'alterar'){
    $medico = buscarMedico($id);
    $nome = $medico['nome'];
    $email = $medico['email'];
    $cpf = $medico['cpf'];
    $rg = $medico['rg'];
    $idade = $medico['idade'];
    $crm = $medico['crm'];
    $especialidade = $medico['especialidade'];
    $endereco = $medico['endereco'];
    $cidade = $medico['cidade'];
    $estado_id = $medico['estado_id'];
    $cep = $medico['cep'];
  }

  if($acao == 'excluir'){
    excluirMedico($id);
  }
}

if(!empty($_POST)) {
  if (empty($_POST['id'])) {
      salvarMedico($_POST);
  } else {
      editarMedico($_POST);
  }
}

$medicos = listarMedicos();


?>
<html>
<head>
    <title> Cadastro medicos </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Medicos </h1>
<br>
<br>
<form action ="medico.php" method ="POST" enctype= "multipart/form-data">

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
      <th> CRM </th>
      <th> ESPECIALIDADE </th>
      <th> ENDEREÇO </th>
      <th> CIDADE </th>
      <th> ESTADO </th>
      <th> CEP </th>
      <th> &nbsp; </th>
      <th> &nbsp; </th>
    </tr>
    </thead>
    <?php
      foreach ($medicos as $medico){
    ?>      
    <tr>
      <td><?=$medico["id"]?></td>
      <td><?=$medico["nome"]?></td>
      <td><?=$medico["email"]?></td>
      <td><?=$medico["cpf"]?></td>
      <td><?=$medico["rg"]?></td>
      <td><?=$medico["idade"]?></td>
      <td><?=$medico["crm"]?></td>
      <td><?=$medico["especialidade"]?></td>
      <td><?=$medico["endereco"]?></td>
      <td><?=$medico["cidade"]?></td>
      <td><?=$medico["estado_id"]?></td>
      <td><?=$medico["cep"]?></td>
      <td><a class = "btn btn-outline-secondary" href = "medico.php?acao=alterar&id=<?=$medico['id']?>" >Alterar</a></td>
      <td><a class = "btn btn-outline-secondary" href = "cdMedico.php?acao=excluir&id=<?=$medico['id']?>" onclick="return confirm ('Você tem certeza disto?')">Excluir</a></td>
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