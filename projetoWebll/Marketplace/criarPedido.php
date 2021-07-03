<?php
    include_once "../fachada.php";
    include_once "../utilitarios/functions.php";

    session_start();
    $info_pedido = array();

    if(!isset($_SESSION['usuario_logado']))
    {
        header("Location: indexLogin.php");
    }

    $usuario = $_SESSION['usuario_logado'];
    $produtos = $_SESSION['produtos_quantidade'];

 
    $daoPedido = $factory->getPedidoDao();
    $daoCliente = $factory->getClienteDao();
    $daoProduto = $factory->getProdutoDao();

    $cliente = $daoCliente->buscaUsuarioCliente($usuario->getId());
    $pedido = new Pedido(0, null, null, 'NOVO', 0, $cliente->getClienteid());

    $id = $daoPedido->insere($pedido);
    $pedido = $daoPedido->buscaPorId($id);

    foreach($produtos as $item_produto)
    {
        $produto = $daoProduto->buscaPorId($item_produto->produtoid);
        $daoPedido->insereItemPedido($pedido, $produto, $item_produto);
        $daoProduto->AlterarEstoque(1,$item_produto->produtoid, $item_produto->quantidade);
  
    }

    clearSessionCarrinho();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>

    <style>
        .box{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top:250px;">
        <div class="row">
            <h2 class="box">Pedido Realizado com Sucesso!</h2>
        </div>
        <br/>
        <form action="index.php" method="get">
            <div class="row box">
                <div class="col-4">
                    <h3>Pedido Número <?php echo $id; ?></h3>
                    <button type="submit" class="btn btn-primary" style="margin-top:10px;">Voltar a Loja</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../libs/vendor/jquery/jquery.min.js"></script>
    <script src="../libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/Marketplace/indexPedido.js"></script>
</body>
</html>