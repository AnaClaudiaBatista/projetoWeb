<?php
include_once "fachada.php";

$Produtoid      = @$_GET["Produtoid"];

$fornecedor = new Fornecedor($Produtoid, null, null, null);
$dao = $factory->getProdutoDao();
$dao->removePorId($Produtoid);


header("Location: consultaProduto.php");


exit;

?>  