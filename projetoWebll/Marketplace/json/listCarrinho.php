<?php
    include_once "../../fachada.php";
    include_once "../../utilitarios/functions.php";

    session_start();

    $produtos_carrinho = [];

    if(isset($_SESSION['produtos_carrinho']))
    {
        $produtos_carrinho = $_SESSION['produtos_carrinho'];
    }
    else{
        $_SESSION['produtos_carrinho'] = $produtos_carrinho;
    }

    echo json_encode(Produto::returnJson($produtos_carrinho));
?>