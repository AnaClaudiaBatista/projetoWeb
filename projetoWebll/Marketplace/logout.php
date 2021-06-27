<?php
    session_start();
    $_SESSION['usuario_logado'] = null;

    header('Location: index.php');
?>