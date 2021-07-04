<?php 
    include_once "../fachada.php";
    session_start();

    $daoPedido = $factory->getPedidoDao();

    $pedidoid = $_POST['pedidoid'];
    $nome = $_POST['nome'];

    $pedidos = $daoPedido->buscaTodosIdNome($numero, $nome);

    $_SESSION['pedidos_filtros'] = array('pedidoid'=> $numero, 'nome'=> $nome, 'pedidos'=> $pedidos);

    header('Location: IndexPedidos.php');
?>