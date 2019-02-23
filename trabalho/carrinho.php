<?php

require_once 'funcoes.php';

session_start();

if(!empty($_SESSION['master'])){
    session_destroy();
    header("Location: login.php");
}

if(empty($_SESSION['cliente'])){
    header("Location: login.php");
}



if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $acao = $_GET['acao'];
        if($acao == 'excluir'){
        excluirCarrinho($id);
    } 
    else
    {
    $medicamento = buscarMedicamento($id);

    if(empty($_SESSION['carrinho'])){
        $_SESSION['carrinho']= array();
    }
    
    array_push($_SESSION['carrinho'],$medicamento);
    }
}



//print_r($_SESSION['carrrinho']);

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

<form action ="medicamento.php" method ="POST" enctype= "multipart/form-data">

</form>
<table class = "table">
<thead class="thead-dark">
     <tr>
        
        <th scope="col">Produto</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Valor</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>

    </tr>
</thead>

<?php

foreach($_SESSION['carrinho'] as $item){
?>
    <tr>
        
        <td><?=$item['nome']?></td>
        <td><?=1?></td>
        <td><?=$item['valor']?></td>
        <td>&nbsp;</td>
        <td><a class = "btn btn-outline-secondary" href = "carrinho.php?acao=excluir&id=<?=$item['id']?>" onclick="return confirm ('Você tem certeza disto?')">Remover</td>

    </tr>
    

<?php

}
?>
</table>

<a class = "btn btn-outline-secondary" href = "concluirCompra.php">Concluir Compra</a>
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