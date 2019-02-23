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
$estado = "";
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
$estados = listarEstados();



?>

<html>
<head>
    <title> Medicos </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Medico </h1>
<br>
<br>
<form action ="medico.php" method ="POST" enctype="multipart/form-data">
<input type ="hidden" name="id" value = "<?=$id?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome Completo</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome completo."value = "<?=$nome?>">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu Email" value = "<?=$email?>">
    </div>
  </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="cep">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value = "<?=$cpf?>">
        </div>
        <div class="form-group col-md-4">
        <label for="cep">RG</label>
        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" value = "<?=$rg?>">
        </div>
        <div class="form-group col-md-4">
        <label for="cep">Idade</label>
        <input type="text" class="form-control" id="idade" name="idade" placeholder="Digite a sua Idade." value = "<?=$idade?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
        <label for="crm">CRM</label>
        <input type="text" class="form-control" id="crm" name="crm" placeholder="Digite a CRM." value = "<?=$crm?>">
        </div>
        <div class="form-group col-md-5">
        <label for="especialidade">Especialidade</label>
        <input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="Digite a especialidade." value = "<?=$especialidade?>">
        </div>
    </div>
  <div class="form-group">
    <label for="endereco">Endereço</label>
    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o seu endereço." value = "<?=$endereco?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="cidade">Cidade</label>
      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade onde reside." value = "<?=$cidade?>">
    </div>
    <div class="form-group col-md-4">
      <label for="estado">Estado</label>
        <select id="estado_id" name="estado_id" class="form-control" >
        <?php
            foreach ($estados as $estado){
              $selected = "";
              if($estado ['id'] == $estado_id){
                $selected = "selected";

              }

        ?>
            <option <?=$selected?> value = "<?=$estado['id']?>"><?=$estado['nome']?></option>
        <?php
            }
        ?>

      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value = "<?=$cep?>">
    </div>
  </div>
  
  <input type="submit" value= "Salvar"class="btn btn-outline-secondary">
  <a href="cdMedico.php  " class="btn btn-outline-secondary" role="button" aria-pressed="true">Lista de Cadastros</a>
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
        <script>
             $('#cpf').mask('000.000.000-00', {reverse: true});
             $('#rg').mask('00.000.000-0', {reverse: true});
             $('#cep').mask('00.000-000', {reverse: true});
             $('#idade').mask('000', {reverse: true});

        </script>
</body> 

</html>