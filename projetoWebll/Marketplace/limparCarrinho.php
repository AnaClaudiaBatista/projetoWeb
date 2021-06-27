<?php
    session_start();
    $_SESSION['produtos_carrinho'] = null;

    // $produtos = $_SESSION['produtos_carrinho'];
    // var_dump($produtos);

    header('Location: index.php');
?>