<?php
include_once "fachada.php";
include "verifica.php";
$produtoid = @$_POST["produtoid"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorId($produtoid);
if($produto) {
	$page_title = "Demo : Exibindo produto : " . $produto->getNome();
} else {
	$page_title = "Demo : produto não encontrado!";
} 

// layout do cabeçalho
include_once "teste_layout_header.php";
if($produto) {
	echo "<div class ='cadastro'>";
//dados do produto
echo "<h1>ID       : " . $produto->getProdutoid() . "</h1>";
echo "<p> Nome     : " . $produto->getNome() . "</p>";
echo "<p> Descricao: " . $produto->getDescricao() . "</p>";
//echo "<p> Foto     : " . $produto->getFoto() . "</p>";

// botão voltar
echo "<a href='consultaProduto.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "teste_layout_footer.php";
