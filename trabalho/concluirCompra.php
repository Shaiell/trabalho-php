<?php

require_once "funcoes.php";
session_start();

if(!empty($_SESSION['master'])){
    session_destroy();
    header("Location: login.php");
}

if(empty($_SESSION['cliente'])){
    header("Location: login.php");
}


$cliente = $_SESSION['cliente'];
$carrinho = $_SESSION['carrinho'];

salvarPedido ($cliente, $carrinho);

unset($_SESSION['carrinho']);

?>
<html>
<head>
    <title> Venda Produtos </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
            
<body>   
<?php   
 include_once("header.php");   
 
 //print_r ($_SESSION); 
 ?>  


<main role="main" class="container">

<table class = "table table-borderless">  

     <h1>Pedido Efetuado!</h1>
     <br>
     <br>
     <br>
     <br>
     <br>

     <a class = "btn btn-outline-secondary" href = "home.php">Pagina inicial</a>

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