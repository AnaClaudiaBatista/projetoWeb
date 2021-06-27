<?php
    include_once "../fachada.php";
    include_once "../utilitarios/functions.php";
    $dao = $factory->getProdutoDao();
    $produtos = $dao->buscaTodos();

    session_start();

    $usuario_logado = null;
    $nome_usuario = "";
    $action_url = "";

    $info = returnInfoUsuarioLogado()[0];
    $usuario_logado = $info['usuario_logado'];
    $nome_usuario = $info['nome_usuario'];
    $action_url = $info['action_url'];
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loja Virtual</title>

    <!-- Custom fonts for this template-->
    <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../libs/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cart-plus fa-fw"></i>
                                <!-- Counter - Alerts -->
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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user fa-fw"></i>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Informações do Usuário
                                </h6>
                                <?php
                                    if(isset($usuario_logado))
                                    {
                                        $action = 'logout.php';
                                        $labelName = 'Logout';

                                        echo 
                                        '<div class="dropdown-item d-flex align-items-center">' .
                                            '<div class="mr-3">' .
                                                '<div class="icon-circle bg-primary">'.
                                                    '<i class="fas fa-file-alt text-white"></i>' .
                                                '</div>'.
                                            '</div>'.
                                            '<div class="small text-gray-500">Meus Pedidos</div>'.
                                            '<span class="font-weight-bold">Visualizar Pedidos</span>'.
                                        '</div>';
                                    }
                                    else{
                                        $action = 'indexLogin.php?isLogin=1';
                                        $labelName = 'Log in';
                                    }

                                    echo '<a class="dropdown-item text-center small text-green" href="' . $action .'">' . $labelName . '</a>';
                                ?>
                                
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Produtos</h1>
                    </div>

                    <p style="margin: 2px;"></p>

                    <?php
                        echo '<div class="row">';

                        foreach ($produtos as $produto) {
                            $estoque = $produto->getEstoque();

                            echo '<div class="card" style="width: 25rem;">';
                                //echo '<img class="card-img-top" src="..." alt="Card image cap">';
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">' . $produto->getNome() . '</h5>';
                                    echo '<p class="card-text">' . $produto->getDescricao() . '</p>';
                                    echo '<p class="card-text">R$ ' . $estoque->getPreco() . '</p>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                    

                                    if($estoque->getQuantidade() == null || $estoque->getQuantidade() <= 0)
                                    {
                                        echo '<p>Produto indisponível!</p>';
                                    }
                                    else{
                                        echo '<button style="margin: 2px;" type="button" sty class="btn btn-primary btn-lg" onclick="addCarinho(this);" name="' . $produto->getProdutoId() . '">Carrinho <i class="fas fa-cart-plus"></i></button>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }

                        echo '</div>';
                    ?>
                    
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
        <!-- Bootstrap core JavaScript-->
        <script src="../libs/vendor/jquery/jquery.min.js"></script>
        <script src="../libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../libs/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../libs/js/sb-admin-2.min.js"></script>

        <script src="../scripts/Marketplace/index.js"></script>
</body>

</html>