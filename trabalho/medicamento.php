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
$bula = "";
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
      $bula = $medicamento['bula'];
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
    <title> Medicamentos </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/richtext.min.css">
    
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Medicamento </h1>
<br>
<br>
<form action ="medicamento.php" method ="POST" enctype="multipart/form-data">
<input type ="hidden" name="id" value = "<?=$id?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome Completo</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome." value = "<?=$nome?>">
    </div>
    <div class="form-group col-md-4">
      <label for="lote">Lote</label>
      <input type="text" class="form-control" id="lote" name="lote" placeholder="Digite o lote" value = "<?=$lote?>">
    </div>
  </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="dtFabricacao">Data de fabricação</label>
        <input type="date" class="form-control" id="dtFabricacao" name="dtFabricacao" placeholder="Informe a data de fabricação." value = "<?=$dtFabricacao?>">
        </div>
        <div class="form-group col-md-4">
        <label for="dtValidade">Data de validade</label>
        <input type="date" class="form-control" id="dtValidade" name="dtValidade" placeholder="Informe a data de validade." value = "<?=$dtValidade?>">
        </div>
        <div class="form-group col-md-4">
        <label for="valor">Valor</label>
        <input type="money" class="form-control" id="valor" name="valor" placeholder="Digite o valor de venda." value = "<?=$valor?>">
        </div>
    </div>
    <div class="form-group">
        <label for="bula">Bula</label>
        <textarea type = text class="content" id="bula" name="bula"rows="3" placeholder="Digite a Bula" value = "<?=$bula?>"></textarea>
  </div>
    <div class="form-group col-md-6">
        <label for="imagen">Imagem</label>
        Arquivo:<input type="file"  class="form-control" id="imagem" name="imagem"  value = "<?=$imagem?>">
    </div>   
    <input type="submit" value= "Salvar"class="btn btn-outline-secondary">
    <a href="cdMedicamento.php  " class="btn btn-outline-secondary" role="button" aria-pressed="true">Lista de Cadastros</a>
</form>
</main>

 <?php   
 include_once("footer.php");    
?> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.richtext.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <script>
             $('#valor').mask('#.##0,00', {reverse: true});

        </script>
        <script>
    $(document).ready(function() {
        $('.content').richText();
    });
</script>
</body> 

</html>