<?php
include "../verifica.php";
include_once "../fachada.php";
include_once "../navegacao/teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getFornecedorDao();
$fornecedores = $dao->buscaTodos();



if ($fornecedores) {

	echo "<h2>Consulta fornecedores </h2>";
	echo "<div class='form-group input-group'>
	<button class='btn btn-primary' type='button'>
	<i class='fas fa-search fa-sm' ></i>
     </button>
	<input name='consulta' id='txt_consulta' placeholder='Consultar' type='text' class='form-control'>
	</div>";



	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
	echo "<th>ID Fornecedor</th>";
	echo "<th>Nome</th>";
	echo "<th>CNPJ</th>";
	echo "<th>Telefone</th>";
	echo "</tr>";

	foreach ($fornecedores as $fornecedor) {

		echo "<tr onclick=location.href='modificaFornecedor.php?fornecedorid={$fornecedor->getFornecedorid()}'>";
		echo "<td>{$fornecedor->getFornecedorid()}</td>";
		echo "<td>{$fornecedor->getNome()}</td>";
		echo "<td>{$fornecedor->getCnpj()}</td>";
		echo "<td>{$fornecedor->getTelefone()}</td>";
		echo "<td>";

		// botão para remover um usuário
		echo "<a href='remove_fornecedor.php?fornecedorid={$fornecedor->getFornecedorid()}' class='btn btn-danger left-margin'";
		echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
		echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "<a href='cadastroFornecedores.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</div>";

// layout do rodapé
include_once "../navegacao/teste_layout_footer.php";
