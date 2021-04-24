<?php
include "verifica.php";
include_once "fachada.php";
include_once "teste_layout_header.php";

echo "<section>";

// procura usuários

$dao = $factory->getFornecedorDao();
$fornecedores = $dao->buscaTodos();

// display the products if there are any
if ($fornecedores) {
	/*echo "<div class='cadastro'>";
    echo "<h2>Consulta fornecedores </h2>";*/
	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
	echo "<th>ID Fornecedor</th>";
	echo "<th>Nome</th>";
	echo "<th>CNPJ</th>";
	echo "<th>Telefone</th>";
	echo "<th>Email</th>";
	echo "<th>Descricao</th>";
	echo "</tr>";

	foreach ($fornecedores as $fornecedor) {

		echo "<tr>";
		echo "<td>{$fornecedor->getFornecedorid()}</td>";
		echo "<td>{$fornecedor->getNome()}</td>";
		echo "<td>{$fornecedor->getCnpj()}</td>";
		echo "<td>{$fornecedor->getTelefone()}</td>";
		echo "<td>{$fornecedor->getEmail()}</td>";
		echo "<td>{$fornecedor->getDescricao()}</td>";
		echo "<td>";
		// botão para mostrar um usuário
		echo "<a href='mostra_fornecedor.php?id={$fornecedor->getFornecedorid()}' class='btn btn-primary left-margin'>";
		echo "<span class='glyphicon glyphicon-list'></span> Mostra";
		echo "</a>";
		// botão para alterar um usuário
		/*echo "<a href='modifica_usuario.php?id={$usuario->getId()}' class='btn btn-info left-margin'>";
				echo "<span class='glyphicon glyphicon-edit'></span> Altera";
				echo "</a>";*/
		// botão para remover um usuário
		/*echo "<a href='remove_usuario.php?id={$usuario->getId()}' class='btn btn-danger left-margin'";
				echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
				echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
				echo "</a>";*/
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "<a href='cadastroFornecedores.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</section>";

// layout do rodapé
include_once "teste_layout_footer.php";
