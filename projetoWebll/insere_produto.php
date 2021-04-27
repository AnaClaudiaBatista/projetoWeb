<?php
include_once "fachada.php";

$produtoid     = @$_POST["produtoid"]; 
$nome          = @$_POST["nome"];
$descricao     = @$_POST["descricao"];
$foto          = @$_POST["foto"];


$produto = new Produto($produtoid, $nome, $descricao, null);
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



exit;

?>

