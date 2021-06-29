<?php
    include_once "../fachada.php";
    include_once "../utilitarios/functions.php";
    session_start();

    $usuario_logado = null;
    $nome_usuario = "";
    $action_url = "";
    $isSession = false;
    $numero_filtro = "";
    $nome_filtro = "";

    $info = returnInfoUsuarioLogado()[0];
    $usuario_logado = $info['usuario_logado'];
    $nome_usuario = $info['nome_usuario'];
    $action_url = $info['action_url'];

    $daoPedido = $factory->getPedidoDao();

    if(isset($_SESSION['pedidos_filtros']))
    {
        $session_array = $_SESSION['pedidos_filtros'];
        $pedidos = $session_array['pedidos'];
        $numero_filtro = $session_array['numero'];
        $nome_filtro = $session_array['nome'];
        $isSession = true;
    }
    else{
        $pedidos = $daoPedido->buscaTodos($usuario_logado->getPerfilid(), $usuario_logado->getId());
    }

    $adm_perfil = $usuario_logado->getPerfilid();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <!-- Custom fonts for this template-->
    <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form action="buscarPedido.php" method="post" id="form">
        <input type="hidden" name="numero" id="numero"/>
        <input type="hidden" name="nome" id="nome"/>
    </form>
    <div class="container" style="margin:20px">
        <div class="row">
            <h2>Meus Pedidos</h2>
        </div>
        <br/>
        <?php
            if($adm_perfil == 1)
                echo '
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">Número</label>
                        <input type="number" value="' . $numero_filtro . '" class="form-control text-center" id="numero_text"/>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Nome Cliente</label>
                        <input type="text" value="' . $nome_filtro . '" class="form-control text-center" id="nome_text"/>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-sm-6">
                        <button class="btn btn-success" id="btnFiltrar">Filtrar</button>
                        <button class="btn btn-secondary">Limpar Filtro</button>
                        <a href="index.php" class="btn btn-warning">Voltar a loja</a>
                    </div>
                </div>';
            else
                echo '<a href="index.php" class="btn btn-warning">Voltar a loja</a>';
        ?>
        <br/>
        <table class="table">
            <thead>
                <tr>
                    <th class='text-center'>Num Pedido</th>
                    <th class='text-center'>Cliente</th>
                    <th class='text-center'>Data Pedido</th>
                    <th class='text-center'>Situação</th>
                    <th class='text-center'>Data Entrega</th>
                    <th class='text-center'>Valor Total</th>
                    <?php 
                        if($adm_perfil == 1)
                        {
                            echo "<th class='text-center'>Entregar Pedido</th>";
                        }
                    ?>
                    
                    <th class='text-center'>Visualizar Pedido</th>
                    <th class='text-center'>Cancelar Pedido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($pedidos as $pedido) {
                        $situacaoCancelado = strcmp($pedido->getSituacao(), 'CANCELADO') == 0 ||
                        strcmp($pedido->getSituacao(), 'ENTREGUE') == 0  ? 'disabled' : '';

                        echo '<tr>';
                            echo "<td class='text-center'>{$pedido->getNumero()}</td>";
                            echo "<td class='text-center'>{$pedido->getNomeCliente()}</td>";
                            echo "<td class='text-center'>{$pedido->getDataPedido()}</td>";
                            echo "<td class='text-center'>{$pedido->getSituacao()}</td>";
                            echo "<td class='text-center'>{$pedido->getDataEntregue()}</td>";
                            echo "<td class='text-center'>{$pedido->getValorTotal()}</td>";
                            
                            if($adm_perfil == 1)
                            {
                                echo "<td class='text-center'><button " . $situacaoCancelado . " type='button' onclick='alterarPedido(this,\"ENTREGUE\");' name='{$pedido->getNumero()}' class='btn btn-success'>-></button></td>";
                            }
                            
                            echo "<td class='text-center'><button type='button' onclick='visualizarPedido({$pedido->getNumero()});' class='btn btn-primary'>*</button></td>";
                            echo "<td class='text-center'><button " . $situacaoCancelado . " type='button' onclick='alterarPedido(this,\"CANCELADO\");' name='{$pedido->getNumero()}' class='btn btn-danger'>X</button></td>";
                        echo '</tr>';
                    }

                    if($isSession)
                    {
                        $_SESSION['pedidos_filtros'] = null;
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pedido</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-2">
                        <label>Cliente:</label>
                        <label class="form-control text-center" id="pedido_cliente"></label>
                    </div>
                    <div class="col-2">
                        <label>Data Pedido:</label>
                        <label class="form-control text-center" id="pedido_datapedido"></label>
                    </div>
                    <div class="col-2">
                        <label>Situação:</label>
                        <label class="form-control text-center" id="pedido_situacao"></label>
                    </div>
                    <div class="col-2">
                        <label>Valor Total:</label>
                        <label class="form-control text-center" id="pedido_cliente"></label>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <h5 class="modal-title">Detalhe</h5>
                </div>
                <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th class='text-center'>Produto</th>
                            <th class='text-center'>Quantidade</th>
                            <th class='text-center'>Preço</th>
                        </tr>
                    </thead>
                    <tbody id="pedido_itens">
                    </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../libs/vendor/jquery/jquery.min.js"></script>
    <script src="../libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/Marketplace/indexPedidos.js"></script>
</body>
</html>