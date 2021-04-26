<?php
include_once "fachada.php";

$clienteid = @$_GET["clienteid"];

$cliente = new Cliente($clienteid, null, null, null,null, null);
$dao = $factory->getClienteDao();
$dao->removePorId($clienteid);


//header("Location: consultaClientes.php");


exit;

?>  