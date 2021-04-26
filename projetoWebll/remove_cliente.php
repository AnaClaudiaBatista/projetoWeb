<?php
include_once "fachada.php";

$clienteid = @$_GET["clienteid"];

$cliente = new Cliente($clienteid, $nome, $cpf, $telefone, $email, $cartaocredito);
$dao = $factory->getClienteDao();
$dao->removePorId($clienteid);

header("Location: consultaClientes.php");
exit;

?>