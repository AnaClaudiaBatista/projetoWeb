<?php
include_once "../fachada.php";

$pedidoid      = @$_GET["pedidoid"];

$pedido = new Pedido($pedidoid, null, null, null,null,null,null);
$dao = $factory->getPedidoDao();
if ($dao->removePorId($pedidoid)){
    echo '<div class="alert alert-sucess">
    <strong>Sucesso!</strong> pedido removido.
     </div>';
     include_once "consultaCLientes.php";
    // header("Location: consultaCLientes.php");
}else{
    echo '<div class="alert alert-danger">
              <strong>Erro ao remover!</strong> Não foi possível remover o pedido.
              </div>';
}



header("Location: consultaPedido.php");


exit;

?>  