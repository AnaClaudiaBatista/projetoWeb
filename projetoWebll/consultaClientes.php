<?php
include "verifica.php";
include_once "fachada.php";
include_once "teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getClienteDao();
$clientes = $dao->buscaTodos();

// display the products if there are any
if($clientes) {
    /*echo "<div class='cadastro'>";
    echo "<h2>Consulta Clientes </h2>";*/
	
	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nome</th>";
		echo "<th>CPF</th>";
		echo "<th>Telefone</th>";
		//echo "<th>Email</th>";
		//echo "<th>cartaoCredito</th>";
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
				// botão para mostrar um usuário
			/*	echo "<a href='mostra_cliente.php?id={$cliente->getClienteid()}' class='btn btn-primary left-margin'>";
					echo "<span class='glyphicon glyphicon-list'></span> Mostra";
				echo "</a>";*/
				 //botão para alterar um usuário
				/*echo "<a href='modifica_usuario.php?id={$cliente->getClienteid()}' class='btn btn-info left-margin'>";
				echo "<span class='glyphicon glyphicon-edit'></span> Altera";
				echo "</a>";*/
				// botão para remover um usuário
				echo "<a href='remove_cliente.php?id={$cliente->getClienteid()}' class='btn btn-danger left-margin'";
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
