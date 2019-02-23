<?php


require_once "funcoes.php";

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$retorno = validarLogin($login,$senha);

if(!empty($retorno)){
$cod = $retorno['cod'];
    if ($cod == "1"){

        $cliente = buscarCliente($retorno['id']);
        $_SESSION['cliente'] = $cliente;

        header("Location: home.php");
    }
    else {

        $master = buscarMaster($retorno['id']);
        $_SESSION['master'] = $master;

        header("Location: home.php");   
    }
} 
else 
{
    echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
    //echo "Login ou senha errado";
}

?>