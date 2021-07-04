<?php
include_once "../fachada.php"; 

$pedidoid     = @$_GET["pedidoid"];
$data_emissao          = @$_GET["data_emissao"];
$data_entrega          = @$_GET["data_entrega"]; 
$situacao          = @$_GET["situacao"];
$valorTotal     = @$_GET["valorTotal"];
$clienteid          = @$_GET["clienteid"];
$nome_cliente          = @$_GET["nome_cliente"];

$pedido = new Pedido($pedidoid, $data_emissao,$data_entrega,$situacao,$valorTotal,$clienteid,$nome_cliente);
$dao = $factory->getPedidoDao();
$dao->altera($pedido);

header("Location: consultaPedido.php");  
exit;

?>
