<?php
include_once "../fachada.php";
//include_once "../utilitarios/images.php";

$pedidoid     = @$_GET["pedidoid"];
$data_emissao          = @$_GET["data_emissao"];
$data_entrega          = @$_GET["data_entrega"]; 
$situacao          = @$_GET["situacao"];
$valorTotal     = @$_GET["valorTotal"];
$clienteid          = @$_GET["clienteid"];
$nome_cliente          = @$_GET["nome_cliente"];
//$image         = @$_FILES["file"];


//$content = file_get_contents($image["tmp_name"]);
//$foto = pg_escape_bytea($content);

$pedido = new Pedido($pedidoid, $data_emissao,$data_entrega,$situacao,$valorTotal,$clienteid,$nome_cliente);
$dao = $factory->getPedidoDao();
$dao->insere($pedido);
header("Location: consultaPedido.php");
/*
$dao = $factory->getProdutoDao();
if ($dao->insere($produto)){
    echo '<div class="alert alert-sucess">
    <strong>Sucesso!</strong> avaliação cadastrada.
     </div>';
     include_once "consultaProduto.php";
    // header("Location: consultaCLientes.php");
}else{
    echo '<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a avaliação.
              </div>';
}
*/

exit;

?>

