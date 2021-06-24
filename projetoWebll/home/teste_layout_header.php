<!DOCTYPE HTML>

<html lang=pt-br>

<head>
  <meta charset="UTF-8">


  <!-- Latest compiled and minified Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

  <!-- our custom CSS -->
  <link rel="stylesheet" href="../libs/js/js.js" />
  <link rel="stylesheet" href="../libs/css/style.css" />
  <link rel="stylesheet" href="../libs/css/2custom2.css" />
  <link rel="stylesheet" href="../libs/css/1custom.css" />
  <link rel="stylesheet" href="../libs/css/bootstrap.min.css" />

</head>

<body>
  <header>
    <!-- NAV FIXED -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark navegacao">
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="img/logo2.png" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menu Colapso">
          <span class="navbar-toggler-icon text-light"></span>
        </button>

        <div id="menu" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto text-light nav-menu">
            <li class="nav-item">




              <!--   <li><a class="sub-category">Inicio</a> -->


              <?php

              include_once "../comum.php";

              if (is_session_started() === FALSE) {
                // Informações de login
                //echo $_SESSION["nome_usuario"];
                session_start();
              }
              echo "<a href='../home/inicio.php' class='nav-link text-light'>Inicio</a></li>";

             

              if (isset($_SESSION["nome_usuario"])) {
              ?>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link text-light" role="button" data-toggle="dropdown"> Clientes </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../cliente/cadastroCliente.php">Cadastrar Clientes</a>
                <a class="dropdown-item" href="../cliente/consultaCliente.php">Consultar Clientes</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link text-light" role="button" data-toggle="dropdown"> Fornecedores</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../fornecedor/cadastroFornecedor.php">Cadastrar Fornecedor</a>
                <a class="dropdown-item" href="../fornecedor/consultaFornecedor.php">Consultar Fornecedor</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link text-light " role="button" data-toggle="dropdown"> Produtos</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../produto/cadastroProduto.php">Cadastrar Produto</a>
                <a class="dropdown-item" href="../produto/consultaProduto.php">Consultar Produto</a>
            </li>
            <li class="nav-item dropdown">              
              <?php
                echo " <a href='#' class='nav-link dropdown-toggle text-light'  role='button' data-toggle='dropdown' <i class='fas fa-user'></i>" . $_SESSION["nome_usuario"] . "</a>";
              ?>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">lala</a>
                <a class="dropdown-item" href="#">lala</a>
                <div class="dropdown-divider"></div>
                <?php
                echo "<a class='dropdown-item' href='../login/executa_logout.php'>Sair</a>";
                ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>


  <?php
              }
              else{
                echo "<li><a class='nav-link text-light '  href='../login/login.php'>Login</a></li>";
              }
  ?>
  </header>
</body>

</html>