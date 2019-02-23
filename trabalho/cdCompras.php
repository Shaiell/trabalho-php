<?php

require_once 'funcoes.php';

session_start();

if(empty($_SESSION['master'])){
   header("Location: login.php");
}


$compras = listarCompras();


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
<h1> Lista de Compras </h1>
<br>
<br>
<form action ="concluirCompra.php" method ="POST" enctype= "multipart/form-data">

</form>
<table class = "table">
<thead class="thead-light">
    <tr>
      <th> ID COMPRA</th>
      <th> NOME CLIENTE </th>
      <th> NOME PRODUTO </th>
      <th> VALOR UNITARIO </th>
      <th> DATA</th>
      <th> VALOR TOTAL </th>
      <th> &nbsp; </th>
      <th> &nbsp; </th>
    </tr>
    </thead>
    <?php
      foreach ($compras as $compra){
    ?>      
    <tr>
      <td><?=$compra["id"]?></td>
      <td><?=$compra["nomeitem"]?></td>
      <td><?=$compra["nomemedic"]?></td>
      <td><?=$compra["valor"]?></td>
      <td><?=$compra["dt_compra"]?></td>
      <td><?=$compra["valor_total"]?></td>
      
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