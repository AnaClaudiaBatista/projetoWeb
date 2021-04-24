<?php
include_once "fachada.php";

 $nome          = @$_GET["nome"];
 $cpf           = @$_GET["cpf"];
 $telefone      = @$_GET["telefone"];
 $email         = @$_GET["email"];
 $cartaocredito = @$_GET["cartaocredito"];


$cliente = new Cliente(null,$nome, $cpf, $telefone, $email, $cartaocredito);
$dao = $factory->getClienteDao();
$dao->insere($cliente);

header("Location: consultaCLientes.php");
exit;
