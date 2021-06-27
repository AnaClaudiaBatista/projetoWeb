<?php
    include_once "../../fachada.php";
    session_start();

    $data = $_POST['data'];
    $produtos_quantidades = json_decode($data);
    $produtos = $_SESSION['produtos_carrinho'];

    $valorTotal = Produto::getValorTotal($produtos, $produtos_quantidades);

    echo json_encode($valorTotal);
?>