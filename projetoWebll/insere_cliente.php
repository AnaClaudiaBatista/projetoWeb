<?php
include_once "fachada.php";

 $nome          = @$_POST['nome'];
 $cpf           = @$_POST['cpf'];
 $telefone      = @$_POST['telefone'];
 $email         = @$_POST['email'];
 $cartaocredito = @$_POST['cartaocredito'];



$cliente = new Cliente(null,$nome, $cpf, $telefone, $email, $cartaocredito);
$dao = $factory->getClienteDao();
$dao->insere($cliente);


//header("Location: consultaCLientes.php");
exit;

?>