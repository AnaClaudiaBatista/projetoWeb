<?php
include_once "../fachada.php";

$produtoid      = @$_GET["produtoid"];

$produto = new Produto($produtoid, null, null, null);
$dao = $factory->getProdutoDao();
if ($dao->removePorId($produtoid)){
    echo '<div class="alert alert-sucess">
    <strong>Sucesso!</strong> avaliação cadastrada.
     </div>';
     include_once "consultaCLientes.php";
    // header("Location: consultaCLientes.php");
}else{
    echo '<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a avaliação.
              </div>';
}



header("Location: consultaProduto.php");


exit;

?>  