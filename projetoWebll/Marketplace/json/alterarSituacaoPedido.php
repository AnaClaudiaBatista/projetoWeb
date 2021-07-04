<?php
    include_once "../../fachada.php";
    $daoPedido = $factory->getPedidoDao();
    $daoProduto = $factory->getProdutoDao();

    $id = $_POST['numero'];
    $situacao = $_POST['situacao'];

    $pedido = $daoPedido->buscaPorId($id);
    $pedido->setSituacao($situacao);

    $daoPedido->alteraSituacao($pedido, $situacao);
    $itens = $daoPedido->buscaItensPorPedido($pedido->getPedidoid());

    foreach($itens as $item_produto)
    {
        $daoProduto->AlterarEstoque(0, $item_produto->getProdutoid(), $item_produto->getQuantidade());
    }

    echo json_encode(array('numero'=> $id, 'situacao' => $situacao));

?>