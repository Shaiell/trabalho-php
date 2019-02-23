<?php



if(empty($_SESSION['cliente']) && empty($_SESSION['master'])){

  
 
?>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Pagina Inicial <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
          </div>
          <div class="md-center" id="navbarsExample10">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="rounded-circle" href="carrinho.php"><img src= "carrinho.png" class= "btn btn-outline-secondary"/></a>
              </li>
            </ul>
          </div>

  </nav>

</header>

<?php

}

if(!empty($_SESSION['master'])){
 


?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Pagina Inicial <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cdCompras.php">Lista de Compras</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="home.php" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                  <a class="dropdown-item" href="cliente.php">Cadastro Cliente</a>
                  <a class="dropdown-item" href="medico.php">Cadastro Medico</a>
                  <a class="dropdown-item" href="vendedor.php">Cadastro Vendedor</a>
                  <a class="dropdown-item" href="medicamento.php">Cadastro Medicamento</a>
                </div>
              </li>
            </ul>
          </div>
  </nav>

</header>

<?php

}



if(!empty($_SESSION['cliente'])){
 

?>



<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Pagina Inicial <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
          </div>
          <div class="md-center" id="navbarsExample10">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="rounded-circle" href="carrinho.php"><img src= "carrinho.png" class= "btn btn-outline-secondary"/></a>
              </li>
            </ul>
          </div>
  </nav>

</header>



<?php

}



?>