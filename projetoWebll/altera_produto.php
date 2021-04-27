<?php
include_once "fachada.php"; 

$produtoid     = @$_GET["produtoid"]; 
$nome          = @$_GET["nome"];
$descricao     = @$_GET["descricao"];
//$foto          = @$_GET["foto"];

$produto = new Produto($produtoid, $nome,$descricao,null);
$dao = $factory->getProdutoDao();
$dao->altera($produto);

header("Location: consultaProduto.php");  
exit;

?>
