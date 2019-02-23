<?php

require_once 'funcoes.php';



$id = "";
$nome = "";
$email = "";
$cpf = "";
$rg = "";
$idade = "";
$endereco = "";
$cidade = "";
$estado = "";
$cep = "";
$acao = "";

if(!empty($_GET)){
  $id = $_GET['id'];
  $acao = $_GET['acao'];

  if($acao == 'alterar'){
    $cliente = buscarCliente($id);
    $nome = $cliente['nome'];
    $email = $cliente['email'];
    $cpf = $cliente['cpf'];
    $rg = $cliente['rg'];
    $idade = $cliente['idade'];
    $endereco = $cliente['endereco'];
    $cidade = $cliente['cidade'];
    $estado = $cliente['estado'];
    $cep = $cliente['cep'];
  }

  if($acao == 'excluir'){
    excluirCliente($id);
  }
}

if(!empty($_POST)) {
  salvarCliente($_POST);
}

$clientes = listarClientes();

?>
<html>
<head>
    <title> Clientes </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
</head>
<body class="text-center">
<?php   
 include_once("header.php");    
?>

<main role="main" class="container">
<h1> Cadastro de Cliente </h1>
<br>
<br>
<form action ="cliente.php" method ="POST" enctype= "multipart/form-data">
<input type="hidden" name="id" value="<?=$id?>"/>
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
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value = "<?=$cpf?>">
        </div>
        <div class="form-group col-md-4">
        <label for="rg">RG</label>
        <input type="text" class="form-control" id="rg" name="rg" placeholder="RG" value = "<?=$rg?>">
        </div>
        <div class="form-group col-md-4">
        <label for="idade">Idade</label>
        <input type="text" class="form-control" id="idade" name="idade" placeholder="Digite a sua Idade." value = "<?=$idade?>">
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
        <select id="estado" name="estado" class="form-control" value = "<?=$estado?>">
        <option selected>Escolha...</option>
        <option>Acre (AC)</option>
        <option>Alagoas (AL)</option>
        <option>Amapá (AP)</option>
        <option>Amazonas (AM)</option>
        <option>Bahia (BA)</option>
        <option>Ceará (CE)</option>
        <option>Distrito Federal (DF)</option>
        <option>Espírito Santo (ES)</option>
        <option>Goiás (GO)</option>
        <option>Maranhão (MA)</option>
        <option>Mato Grosso (MT)</option>
        <option>Mato Grosso do Sul (MS)</option>
        <option>Minas Gerais (MG)</option>
        <option>Pará (PA) </option>
        <option>Paraíba (PB)</option>
        <option>Paraná (PR)</option>
        <option>Pernambuco (PE)</option>
        <option>Piauí (PI)</option>
        <option>Rio de Janeiro (RJ)</option>
        <option>Rio Grande do Norte (RN)</option>
        <option>Rio Grande do Sul (RS)</option>
        <option>Rondônia (RO)</option>
        <option>Roraima (RR)</option>
        <option>Santa Catarina (SC)</option>
        <option>São Paulo (SP)</option>
        <option>Sergipe (SE)</option>
        <option>Tocantins (TO)</option>
      </select>
      
    </div>
    <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP"  value = "<?=$cep?>">
    </div>
  </div>
  
  <input type="submit" value= "Salvar"class="btn btn-outline-secondary">
</form>
<table class = "table">
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
    <?php
      foreach ($clientes as $cliente){
    ?>      
    <tr>
      <td><?=$cliente["id"]?></td>
      <td><?=$cliente["nome"]?></td>
      <td><?=$cliente["email"]?></td>
      <td><?=$cliente["cpf"]?></td>
      <td><?=$cliente["rg"]?></td>
      <td><?=$cliente["idade"]?></td>
      <td><?=$cliente["endereco"]?></td>
      <td><?=$cliente["cidade"]?></td>
      <td><?=$cliente["estado"]?></td>
      <td><?=$cliente["cep"]?></td>
      <td><a class = "btn btn-outline-secondary" href = "cliente.php?acao=alterar&id=<?=$cliente['id']?>" >Alterar</a></td>
      <td><a class = "btn btn-outline-secondary" href = "cliente.php?acao=excluir&id=<?=$cliente['id']?>" onclick="return confirm ('Você tem certeza disto?')">Excluir</a></td>
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