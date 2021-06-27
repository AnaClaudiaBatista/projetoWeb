<?php
include_once "../fachada.php";
include_once "../utilitarios/images.php";

$produtoid     = @$_POST["produtoid"]; 
$nome          = @$_POST["nome"];
$descricao     = @$_POST["descricao"];
$image         = @$_FILES["file"];

$content = file_get_contents($image["tmp_name"]);
$foto = pg_escape_bytea($content);

$produto = new Produto($produtoid, $nome, $descricao, $foto);
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

