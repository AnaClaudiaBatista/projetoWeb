<?php
include_once "../fachada.php";

$usuarioid     = @$_GET["usuarioid"]; 
$login          = @$_GET["login"];
$nome          = @$_GET["nome"];
$senha           = @$_GET["senha"];

$dao = $factory->getUsuarioDao();

$usuario = new Usuario($usuarioid,$login, $senha, $nome);

if ($dao->insere($usuario)){
    /*echo '<div class="alert alert-sucess">
    <strong>Sucesso!</strong> avaliação cadastrada.
     </div>';*/

     echo  '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
     echo	'			<div class="modal-dialog modal-lg">';
     echo	'		 		<div class="modal-content">';
     echo	'					Usuario Cdastrado!';
     echo	'				</div>';
 	 echo	'	 		</div>';
     echo	'		</div>';
     include_once "../login/login.php";
    // header("Location: consultaCLiente.php");
}else{
    echo '<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar o usuário.
              </div>';
}



exit;

?>