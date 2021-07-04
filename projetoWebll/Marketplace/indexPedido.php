<?php
    include_once "../fachada.php";
    include_once "../utilitarios/functions.php";
    include_once "../navegacao/teste_layout_header.php";
    //session_start(); ERRO TESTAR DPS

    $usuario_logado = null;
    $nome_usuario = "";
    $produtos = $_SESSION['produtos_carrinho'];
    $action_url = "";

    $info = returnInfoUsuarioLogado()[0];
    $usuario_logado = $info['usuario_logado'];
    $nome_usuario = $info['nome_usuario'];
    $action_url = $info['action_url'];
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>

   
    <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

     Custom styles for this template
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>-->
    <div class="container" style="margin:20px">
        <div class="row">
            <h2>Pedido</h2>
        </div>
        <div class="row">
            <div class="col-2">
                <label>Cliente:</label>
                <label class="form-control text-center"><?php echo $nome_usuario; ?></label>
            </div>
            <div class="col-2">
                <label>Data Pedido:</label>
                <label class="form-control text-center"><?php echo date('d/m/Y') ?></label>
            </div>
            <div class="col-2">
                <label>Status:</label>
                <label class="form-control text-center">NOVO</label>
            </div>
            <div class="col-1">
                <label>Valor Total:</label>
                <label class="form-control text-center" id="valorTotalPedido">R$ 0</label>
            </div>
        </div>
        <hr/>
        <div class="row">
            <h2>Itens Pedido</h2>
        </div>
        <br/>
        <?php
            $index = 0;

            foreach ($produtos as $produto) {
                $estoque = $produto->getEstoque();
                
                echo '<div class="row">';
                    echo "<input type='hidden' name='produtoid' value='{$produto->getProdutoid()}'/>";
                    echo '<div class="col-2">';
                        echo "<label>Nome Produto:</label>";
                        echo "<label class='form-control text-center'>{$produto->getNome()}</label>";
                    echo '</div>';
                    echo '<div class="col-4">';
                        echo "<label>Descrição:</label>";
                        echo "<label class='form-control text-center'>{$produto->getDescricao()}</label>";
                    echo '</div>';
                    echo '<div class="col-sm-2">';
                        echo "<label>Preço UN:</label>";
                        echo "<label class='form-control text-center'>R$ {$estoque->getPreco()}</label>";
                    echo '</div>';
                    echo '<div class="col-sm-2">';
                        echo "<label>Preço Total:</label>";
                        echo "<label class='form-control text-center' name='produtoValorTotal'>R$ {$estoque->getPreco()} </label>";
                    echo '</div>';
                    echo '<div class="col-sm-1">';
                        echo "<label>Quantidade:</label>";
                        echo "<input type='number' name='produtoQuantidade' onchange='checkQuantidade({$produto->getProdutoid()}, this, {$index});' class='form-control text-center' min='1' value='1'/>";
                    echo '</div>';
                    echo '<div class="col-sm-1">';
                        echo "<label> </label>";
                        echo "<button type='button' onclick='deleteDoCarrinho({$produto->getProdutoid()});' class='btn btn-danger'>Remover</button>";
                    echo '</div>';
                echo '</div>';
                echo '<br/>';

                $index += 1;
            }
        ?>
        <div class="row">
            <div class="col-sm-2">
                <form action="<?php echo $action_url; ?>" id="formPedido" method="get">
                    <input type="hidden" name="isPedido" value="<?php echo $usuario_logado != null ? 1 : 0; ?>">
                    <button type="button" id="btnFinalizar" class="btn btn-primary">Finalizar Pedido</button>
                </form>
            </div>
            <div class="col-sm-2">
                <form action="limparCarrinho.php">
                    <button type="submit" class="btn btn-warning">Limpar Carrinho</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    <script src="../libs/vendor/jquery/jquery.min.js"></script>
    <script src="../libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/Marketplace/indexPedido.js"></script>
</body>
</html>-->