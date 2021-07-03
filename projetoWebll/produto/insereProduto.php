<?php
include_once "../fachada.php";
//include_once "../utilitarios/images.php";

$produtoid     = @$_GET["produtoid"]; 
$fornecedorid  = @$_GET["fornecedorid"];
$nome          = @$_GET["nome"];
$descricao     = @$_GET["descricao"];
//$image         = @$_FILES["file"];


//$content = file_get_contents($image["tmp_name"]);
//$foto = pg_escape_bytea($content);

$produto = new Produto($produtoid,$fornecedorid, $nome, $descricao, null);
//$produto = new Produto($produtoid,$fornecedorid, $nome, $descricao, $foto);
$dao = $factory->getProdutoDao();
$dao->insere($produto);
header("Location: consultaProduto.php");
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

