<?php
    include_once "../../fachada.php";

    $produtoid = $_POST['produtoid'];
    $value = $_POST['value'];

    $dao = $factory->getProdutoDao();
    $produto = $dao->buscaPorId($produtoid);
    $result = false;
    $quantidade = 0;

    if(isset($produtoid))
    {
        $estoque = $produto->getEstoque();
        $quantidade = $estoque->getQuantidade();

        if($quantidade >= $value)
        {
            $result = true;
        }
        else{
            $result = false;
        }

        
    }
    else{
        $result = false;
    }

    echo json_encode(
        array(
            'quantidade'=> $quantidade, 
            'check' => $result,
            'preco' => $produto->getEstoque()->getPreco()
        )
    );
?>