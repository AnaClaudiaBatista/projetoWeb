<!DOCTYPE HTML>

<html lang=pt-br>

<head>
  <meta charset="UTF-8">


        <!-- Core plugin JavaScript-->
        <script src="../libs/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../libs/js/sb-admin-2.min.js"></script>

        <script src="../scripts/Marketplace/index.js"></script>
        <script src="../scripts/Marketplace/indexPedido.js"></script>


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
    <!-- Custom styles for this template -->
    <link href="../libs/css/one-page-wonder.min.css" rel="stylesheet">
      <!-- Bootstrap core JavaScript -->
  <script src="../libs/vendor/jquery/jquery.min.js"></script>
  <script src="..libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- Custom fonts for this template-->
   <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href= "libs/sb-admin-2.min.css" rel="stylesheet">
    <title>Loja Virtual</title>

</head>



<body>
  <header>

 
      <!-- Topbar -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark navegacao">

      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="img/logo2.png" height="30">
        </a>



<!-- campo de pesquisa -->
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

<?php

include_once "../comum.php";

/*if (is_session_started() === FALSE) {
  // Informações de login
  //echo $_SESSION["nome_usuario"];
  session_start();
}*/
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
echo "<a href='../marketplace/index.php' class='nav-link text-light'>Inicio</a></li>";


   
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
            <?php
                 }
              ?>
      <!--icone carrinho de compras--> 
      <li class="nav-item dropdown no-arrow mx-1">
    
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-cart-plus fa-fw"></i> 
        <span class="badge badge-danger badge-counter" id="count_carrinho">0+</span>
    </a>        
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown" id="lista_carrinho">
        <!-- <h6 class="dropdown-header">
            Carrinho
        </h6> -->
        <!-- <div class="dropdown-item d-flex align-items-center">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 12, 2019</div>
                <span class="font-weight-bold">A new monthly report is ready to download!</span>
            </div>
        </div> -->
        <!-- <a class="dropdown-item text-center small text-green" href="#">Finalizar Pedido</a> -->
    </div>
</li>         
    
    <!-- icone usuario login -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
            <?php if (isset($_SESSION["nome_usuario"])) { $_SESSION["nome_usuario"]; } ?>
            <i class="fas fa-user fa-fw"></i>
        </a>        
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                 Informações do Usuário
         </h6>
            <?php
                 if (isset($_SESSION["nome_usuario"])) 
                {
                    $action = '../login/executa_logout.php';
                    $labelName = 'Sair';

                    echo 
                    '<div class="dropdown-item d-flex align-items-center">' .
                    '<div class="mr-3">' .
                        '<div class="icon-circle bg-primary">'.
                            '<i class="fas fa-file-alt text-white"></i>' .
                        '</div>'.
                    '</div>'.
                    '<span class="font-weight-bold"><a href="indexPedidos.php">Meus Pedidos</a></span>'.
                '</div>';
                }
                else{
                   // $action = 'indexLogin.php?isLogin=1';
                   $action = '../login/login.php';
                    $labelName = 'Entrar';
                }

                echo '<a class="dropdown-item text-center small text-green" href="' . $action .'">' . $labelName . '</a>';
            ?>
            
        </div>
    </li>
</ul>
</div> 
</nav>


  <?php
              
                echo "<li><a class='nav-link text-light '  href='../login/login.php'>Login</a></li>";
              
  ?>

  </header>
</body>

</html>