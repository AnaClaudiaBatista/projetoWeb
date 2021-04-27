<?php
include "verifica.php";
include_once "fachada.php";
include_once "teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getProdutoDao();
$produtos = $dao->buscaTodos();


if ($produtos) {

	//echo "<h2>Consulta Produto$Produto </h2>";

	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
	echo "<th>Nome</th>";
	echo "<th>Descricao</th>";
	echo "<th>Foto</th>";
	//echo "<th>Email</th>";
	//echo "<th>Descricao</th>";
	echo "</tr>";

	foreach ($produtos as $produto) {
		echo "<tr onclick=location.href='modifica_produto.php?produtoid={$produto->getProdutoid()}'>";
		echo "<td>{$produto->getProdutoid()}</td>";
		echo "<td>{$produto->getNome()}</td>";
		echo "<td>{$produto->getDescricao()}</td>";
		echo "<td>{$produto->getFoto()}</td>";
		//echo "<td>{$produto->getEmail()}</td>";
		//echo "<td>{$produto->getDescricao()}</td>";
		echo "<td>";
		echo "</tr>";
		}
echo "</table>";
}


echo "<a href='cadastroProduto.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</div>";

// layout do rodapé
include_once "teste_layout_footer.php";

