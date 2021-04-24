<?php
include_once "fachada.php";
include "verifica.php";
$clienteID = @$_GET["clienteid"];

$dao = $factory->getClienteDao();
$cliente = $dao->buscaPorId($clienteid);
if($cliente) {
	$page_title = "Demo : Exibindo Cliente : " . $cliente->getNome();
} else {
	$page_title = "Demo : Usuário não encontrado!";
} 

// layout do cabeçalho
include_once "teste_layout_header.php";
if($cliente) {
echo "<section>";
//dados do usuário
echo "<h1> ID : " .  $cliente->getclienteid() . "</h1>";
echo "<p> Nome : " . $cliente->getNome() . "</p>";
echo "<p> CPF : " . $cliente->getCpf() . "</p>";
echo "<p> Telefone : " . $cliente->getTelefone() . "</p>";
echo "<p> Email : " . $cliente->getEmail() . "</p>";

// botão voltar
echo "<a href='consultaClientes.php' class='btn btn-primary left-margin'>";
echo "Voltar";
echo "</a>";
echo "</section>";
}
// layout do rodapé
include_once "teste_layout_footer.php";
?>
