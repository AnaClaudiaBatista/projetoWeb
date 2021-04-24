<?php
include_once "fachada.php";

$id = @$_GET["id"];

$usuario = new Usuario($id,$login,$senha,$nome);
$dao = $factory->getUsuarioDao();
$dao->removePorId($id);

header("Location: usuarios.php");
exit;

?>