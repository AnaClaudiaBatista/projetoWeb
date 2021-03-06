<?php
include "../verifica.php";
include_once "../fachada.php";
include_once "../navegacao/teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getClienteDao();
$clientes = $dao->buscaTodos();


if ($clientes) {

    echo "<h2>Consulta Clientes </h2>";
	echo "<div class='form-group input-group'>
	<button class='btn btn-primary' type='button'>
	<i class='fas fa-search fa-sm' ></i>
     </button>
	<input name='consulta' id='txt_consulta' placeholder='Consultar' type='text' class='form-control'>
	</div>";

	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
	echo "<th>ID Cliente</th>";
	echo "<th>nome</th>";
	echo "<th>CPF</th>";
	echo "<th>Telefone</th>";
	echo "</tr>";

	foreach ($clientes as $cliente) {

		echo "<tr onclick=location.href='modificaCliente.php?clienteid={$cliente->getClienteid()}'>";
		echo "<td>{$cliente->getClienteid()}</td>";
		echo "<td>{$cliente->getNome()}</td>";
		echo "<td>{$cliente->getCpf()}</td>";
		echo "<td>{$cliente->getTelefone()}</td>";
		//echo "<td>{$cliente->getEmail()}</td>";
		//	echo "<td>{$cliente->getCartaocredito()}</td>";
		echo "<td>";		
		echo "<a href='removeCliente.php?clienteid={$cliente->getClienteid()}' class='btn btn-danger left-margin'";
		echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
		echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "<a href='cadastroCliente.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</div>";

// layout do rodapé
include_once "../navegacao/teste_layout_footer.php";
