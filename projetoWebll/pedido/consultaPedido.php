<?php
include "../verifica.php";
include_once "../fachada.php";
include_once "../navegacao/teste_layout_header.php";

echo "<div class='cadastro'>";

// procura usuários

$dao = $factory->getPedidoDao();
$pedidos = $dao->buscaTodos($pedidoid,$data_emissao,$data_entrega,$situacao,$valorTotal,$clienteid,$nome_cliente);


if ($pedidos) {

	echo "<h2>Consulta pedidos </h2>";
	echo "<div class='form-group input-group'>
	<button class='btn btn-primary' type='button'>
	<i class='fas fa-search fa-sm' ></i>
     </button>
	<input name='consulta' id='txt_consulta' placeholder='Consultar' type='text' class='form-control'>
	</div>";

	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
	echo "<th>ID Pedido</th>";
	echo "<th>Data Emissão</th>";
	echo "<th>Data entrega</th>";
	echo "<th>Situação</th>";
	echo "<th>Valor Total</th>";
	echo "<th>Id do Cliente</th>";
	echo "<th>Nome do Cliente</th>";
	echo "</tr>";

	foreach ($pedidos as $pedido) {

		echo "<tr onclick=location.href='modificaPedido.php?pedidoid={$pedido->getPedidoid()}'>";
		echo "<td>{$pedido->getPedidoid()}</td>";
		echo "<td><img style='width:140px;heigth:140px;' src='{$pedido->getFoto()}'/></td>";
		echo "<td>{$pedido->getPedidoid()}</td>";
		echo "<td>{$pedido->getDataPedido()}</td>";
		echo "<td>{$pedido->getDataEntregue()}</td>";
		echo "<td>{$pedido->getSituacao()}</td>";
		echo "<td>{$pedido->getValorTotal()}</td>";
		echo "<td>{$pedido->getClienteid()}</td>";
		echo "<td>{$pedido->getNomeCliente()}</td>";

		echo "<td>";

		// botão para remover um usuário
		echo "<a href='removePedido.php?pedidoid={$pedido->getPedidoid()}' class='btn btn-danger left-margin'";
		echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
		echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}

echo "<a href='cadastroPedido.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</div>";

// layout do rodapé
include_once "../navegacao/teste_layout_footer.php";
