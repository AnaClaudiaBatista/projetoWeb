<?php
include_once "../fachada.php";

$fornecedorid      = @$_GET["fornecedorid"];

$fornecedor = new Fornecedor($fornecedorid, null, null, null,null, null);
$dao = $factory->getFornecedorDao();
$dao->removePorId($fornecedorid);


header("Location: consultaFornecedores.php");


exit;

?>  