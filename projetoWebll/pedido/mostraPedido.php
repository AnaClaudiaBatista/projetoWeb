<?php
include_once "../fachada.php";
include "../verifica.php";

$pedidoid = @$_POST["pedidoid"];

$dao = $factory->getPedidoDao();
$produto = $dao->buscaPorId($produtoid);
if($pedido) {
	$page_title = "Demo : Exibindo pedido : " . $pedido->getNome();
} else {
	$page_title = "Demo : pedido não encontrado!";
} 

// layout do cabeçalho
include_once "../teste_layout_header.php";
if($produto) {
	echo "<div class ='cadastro'>";
//dados do produto
echo "<h1>ID       : " . $produto->getPedidoid() . "</h1>";
echo "<p> Situação     : " . $produto->getSituacao() . "</p>";
echo "<p> Valor Total: " . $produto->getValorTotal() . "</p>";
//echo "<p> Foto     : " . $produto->getFoto() . "</p>";

// botão voltar
echo "<a href='consultaPedido.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "../home/teste_layout_footer.php";
