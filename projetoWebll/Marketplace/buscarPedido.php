<?php 
    include_once "../fachada.php";
    session_start();

    $daoPedido = $factory->getPedidoDao();

    $numero = $_POST['numero'];
    $nome = $_POST['nome'];

    $pedidos = $daoPedido->buscaTodosIdNome($numero, $nome);

    $_SESSION['pedidos_filtros'] = array('numero'=> $numero, 'nome'=> $nome, 'pedidos'=> $pedidos);

    header('Location: IndexPedidos.php');
?>