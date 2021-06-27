<?php
    include_once "../../fachada.php";
    include_once "../../utilitarios/functions.php";

    // $_SESSION['produtos_carrinho'] = [];

    session_start();

    $dao = $factory->getProdutoDao();
    
    $produtoid = $_POST['produtoid'];
    $produto = $dao->buscaPorId($produtoid);
    $produtos_carrinho = [];
    $response = true;

    // var_dump($produto);

    try{
        $produtos_carrinho = $_SESSION['produtos_carrinho'];

        if(Produto::existsInArray($produto, $produtos_carrinho))
        {
            $response = false;
        }
        else{
            $produtos_carrinho[] = $produto; 
        }
    }catch(Exception $ex)
    {
        $produtos_carrinho[] = $produto;
    }
    
    $_SESSION['produtos_carrinho'] = $produtos_carrinho;
    
    echo json_encode(array('check' => $response, 'data' => Produto::returnJson($produtos_carrinho)));
?>