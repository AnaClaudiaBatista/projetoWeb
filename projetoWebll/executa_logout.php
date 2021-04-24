<?php

include_once "comum.php";

//if ( is_session_started() === FALSE ) {
    session_start();
    if(isset($_SESSION["nome_usuario"])) {
        session_destroy();
        header("location: login.php");
        exit();
    } 
//} 
?>


		