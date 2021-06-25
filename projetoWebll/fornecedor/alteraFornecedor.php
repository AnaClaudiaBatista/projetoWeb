<?php
include_once "../fachada.php"; 

$fornecedorid   = @$_GET["fornecedorid"];    
$nome           = @$_GET["nome"];
$cnpj           = @$_GET["cnpj"];
$telefone       = @$_GET["telefone"];
$email          = @$_GET["email"];
$descricao      = @$_GET["descricao"];

$fornecedor = new Fornecedor($fornecedorid,$nome,$cnpj,$telefone,$email,$descricao);
$dao = $factory->getFornecedorDao();
$dao->altera($fornecedorid);

header("Location: consultaFornecedores.php");  
exit;

?>