<?php
include_once "fachada.php";

$nome          = @$_GET["nome"];
$cnpj          = @$_GET["cnpj"];
$telefone      = @$_GET["telefone"];
$email         = @$_GET["email"];
$descricao     = @$_GET["descricao"];


$fornecedor = new Fornecedor(null, $nome, $cnpj, $telefone, $email, $descricao);
$dao = $factory->getFornecedorDao();
$dao->insere($fornecedor);

header("Location: consultaFornecedores.php");
exit;
