<?php
include_once "fachada.php"; 

$id = @$_GET["id"]; 
$login = @$_GET["login"];
$senha = @$_GET["senha"];
$nome = @$_GET["nome"];

$usuario = new Usuario($id,$login,$senha,$nome);
$dao = $factory->getUsuarioDao();
$dao->altera($usuario);

header("Location: usuarios.php");  
exit;

?>