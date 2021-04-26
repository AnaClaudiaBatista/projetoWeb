<?php
include_once "fachada.php";

$clienteid     = @$_GET["clienteid"]; 
$nome          = @$_GET["nome"];
$cpf           = @$_GET["cpf"];
$telefone      = @$_GET["telefone"];
$email         = @$_GET["email"];
$cartaocredito = @$_GET["cartaocredito"];


$cliente = new Cliente($clienteid,$nome,$cpf,$telefone,$email,$cartaocredito);
$dao = $factory->getClienteDao();
$dao->insere($cliente);


header("Location: consultaCLientes.php");
exit;

?>