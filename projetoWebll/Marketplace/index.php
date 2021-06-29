<?php
    include_once "../fachada.php";
    include_once "../utilitarios/functions.php";    
    include_once "../navegacao/teste_layout_header.php";
    
    $dao = $factory->getProdutoDao();
    $produtos = $dao->buscaTodos();

   // session_start();

    $usuario_logado = null;
    $nome_usuario = "";
    $action_url = "";

    $info = returnInfoUsuarioLogado()[0];
    $usuario_logado = $info['usuario_logado'];
    $nome_usuario = $info['nome_usuario'];
    $action_url = $info['action_url'];
?>




    <!-- Page Wrapper -->
    <div id="wrapper" style="margin-top: 100px;">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               

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
                                echo '<div class="card-header py-4">';
                                    echo '<h5 class="card-title">' . $produto->getNome() . '</h5>';
                                    echo '</div>';
                                    echo '<p class="card-text">' . $produto->getDescricao() . '</p>';
                                    echo ' <h1 class="card-title pricing-card-title">R$ ' . $estoque->getPreco() . '</h1>';
                                    echo '</div>';
                                echo '<div class="card-body">';
                                    

                                    if($estoque->getQuantidade() == null || $estoque->getQuantidade() <= 0)
                                    {
                                        echo '<p style="color:red;">Produto indisponível!</p>';
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
