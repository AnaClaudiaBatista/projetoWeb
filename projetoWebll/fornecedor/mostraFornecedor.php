<?php
include_once "../fachada.php";
include "../verifica.php";
$fornecedorid = @$_GET["fornecedorid"];

$dao = $factory->getFornecedorDao();
$fornecedor = $dao->buscaPorId($fornecedorid);
if($fornecedor) {
	$page_title = "Demo : Exibindo Cliente : " . $fornecedor->getNome();
} else {
	$page_title = "Demo : Usuário não encontrado!";
} 

// layout do cabeçalho
include_once "../home/teste_layout_header.php";
if($fornecedor) {
	echo "<div class ='cadastro'>";
//dados do fornecedor
echo "<h1>ID       : " . $fornecedor->getfornecedorid() . "</h1>";
echo "<p> Nome     : " . $fornecedor->getNome() . "</p>";
echo "<p> CNPJ     : " . $fornecedor->getCnpj() . "</p>";
echo "<p> Telefone : " . $fornecedor->getTelefone() . "</p>";
echo "<p> Email    : " . $fornecedor->getEmail() . "</p>";

// botão voltar
echo "<a href='consultaFornecedor.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "../home/teste_layout_footer.php";
