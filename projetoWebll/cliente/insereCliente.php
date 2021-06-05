<?php
include_once "../fachada.php";

$clienteid     = @$_GET["clienteid"]; 
$nome          = @$_POST["nome"];
$cpf           = @$_POST["cpf"];
$telefone      = @$_POST["telefone"];
$email         = @$_POST["email"];
$cartaocredito = @$_POST["cartaocredito"];


$cliente = new Cliente(null,$nome,$cpf,$telefone,$email,$cartaocredito);
$dao = $factory->getClienteDao();
if ($dao->insere($cliente)){
    echo '<div class="alert alert-sucess">
    <strong>Sucesso!</strong> avaliação cadastrada.
     </div>';
     include_once "consultaCLiente.php";
    // header("Location: consultaCLiente.php");
}else{
    echo '<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a avaliação.
              </div>';
}



exit;

?>