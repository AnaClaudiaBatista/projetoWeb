<?php
include "../verifica.php";
include_once "../fachada.php";
include_once "../home/teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getProdutoDao();
$produtos = $dao->buscaTodos();


if ($produtos) {
	?>
	<h2>Consulta produtos </h2>
	
	<div class='form-group input-group'>
	<span class='input-group-addon'><i class='glyphicon glyphicon-search'></i></span>
	<input name='consulta' id='txt_consulta' placeholder='Consultar' type='text' class='form-control'>
	</div>
	
	<table class='table table-hover table-responsive table-bordered '>
	<tr>
	<th>ID Fornecedor</th>
	<th>Nome</th>
	<th>Descrição</th>
	</tr>
	<?php
	foreach ($produtos as $produto) {

		echo "<tr onclick=location.href='modificaProduto.php?produtoid={$produto->getProdutoid()}'>";
		echo "<td>{$produto->getProdutoid()}</td>";
		echo "<td>{$produto->getNome()}</td>";
		echo "<td>{$produto->getDescricao()}</td>";
		echo "<td>";

		// botão para remover um usuário
		echo "<a href='removeProduto.php?produtoid={$produto->getProdutoid()}' class='btn btn-danger left-margin'";
		echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
		echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "<a href='cadastroProduto.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</div>";


// layout do rodapé
include_once "../home/teste_layout_footer.php";
?>

<script>
            $('input#txt_consulta').quicksearch('table#tabela tbody tr');
</script>
