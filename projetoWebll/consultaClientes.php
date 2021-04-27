<?php
include "verifica.php";
include_once "fachada.php";
include_once "teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getClienteDao();
$clientes = $dao->buscaTodos();


if ($clientes) {

  //  echo "<h2>Consulta Clientes </h2>";

	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
	echo "<th>ID Cliente</th>";
	echo "<th>nome</th>";
	echo "<th>CPF</th>";
	echo "<th>Telefone</th>";
	echo "</tr>";

	foreach ($clientes as $cliente) {

		echo "<tr onclick=location.href='modifica_cliente.php?clienteid={$cliente->getClienteid()}'>";
		echo "<td>{$cliente->getClienteid()}</td>";
		echo "<td>{$cliente->getNome()}</td>";
		echo "<td>{$cliente->getCpf()}</td>";
		echo "<td>{$cliente->getTelefone()}</td>";
		//echo "<td>{$cliente->getEmail()}</td>";
		//	echo "<td>{$cliente->getCartaocredito()}</td>";
		echo "<td>";		
		echo "<a href='remove_cliente.php?clienteid={$cliente->getClienteid()}' class='btn btn-danger left-margin'";
		echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
		echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "<a href='cadastroClientes.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</div>";

// layout do rodapé
include_once "teste_layout_footer.php";
