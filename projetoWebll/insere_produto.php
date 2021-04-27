<?php
include_once "fachada.php";
$produtoid  = @$_GET["produtoid"]; 
$nome          = @$_GET["nome"];
$descricao     = @$_GET["descricao"];
$foto          = @$_GET["foto"];


$produto = new Produto($produtoid, $nome, $descricao, $foto);
$dao = $factory->getProdutoDao();
$dao->insere($produto);

header("Location: consultaProduto.php");
exit;

