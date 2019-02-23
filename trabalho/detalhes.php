<?php

require_once "funcoes.php";
session_start();

$id = $_GET['id'];

$medicamento = buscarMedicamento($id);

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
<tr>
   <th> <img src="<?=$medicamento['imagem']?>" alt="" width="300" height="300"/>
    <h4><?=$medicamento['nome']?></h4>
    <h6>R$<?=$medicamento['valor']?></h6>
    <a href="carrinho.php?acao=incluir&id=<?=$medicamento['id']?>" class="btn btn-sm btn-outline-secondary">Adicionar</a></th>

    <th> <h4>BULA</h4> <br> <p><?=$medicamento['bula']?></p></th>
</tr>
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