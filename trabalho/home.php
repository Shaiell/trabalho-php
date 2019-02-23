<?php

require_once 'funcoes.php';

session_start();

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

 ?>  
<main role="main" class="container">

      

<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        <?php

        $medicamentos = listarMedicamentos();
        foreach ($medicamentos as $medicamento) {

        ?>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img class="rounded-circle" 
            src="<?=$medicamento["imagem"]?>" alt="" height="300">
              <div class="card-body">
              <p class="card-text">
              <?=$medicamento['nome']?>
              <h6>R$<?=$medicamento['valor']?></h6>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="detalhes.php?id=<?=$medicamento['id']?>" class="btn btn-sm btn-outline-secondary">Detalhes</a>                    
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>    
      </div>
    </div>
  </div>



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