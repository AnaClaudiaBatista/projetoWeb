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
     echo "<script type=\"text/javascript\">alert('Cadastro realizado com sucesso')</script>"; 
     echo  '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
     echo	'			<div class="modal-dialog modal-lg">';
     echo	'		 		<div class="modal-content">';
     echo	'					Usuario Cdastrado!';
     echo	'				</div>';
 	 echo	'	 		</div>';
     echo	'		</div>';
     //include_once "../login/login.php";
     header("Location: ../login/login.php");
}else{
    echo '<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar o usuário.
              </div>';
}



exit;

/*

//include_once "../fachada.php";

$link = mysqli_connect("localhost", "root", "", "loja_virtual");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$login = mysqli_real_escape_string($link, $_REQUEST['login']);
$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
$senha = mysqli_real_escape_string($link, $_REQUEST['senha']);

if (empty($login) || empty($nome) || empty($senha) ){
    echo "<script type=\"text/javascript\">alert('Voce nao preencheu todos os campos, verifique novamente!')</script>"; 
    echo "<a href='/projetoWebll/registrar/registrar.php'>Voltar ao cadastro</a>";
    exit;
  }

  $sql = "INSERT INTO usuario VALUES (
    null,
    '$login',
    '$nome',
    '$senha'
)";
if(mysqli_query($link, $sql)){
echo "<script type=\"text/javascript\">alert('Cadastro realizado com sucesso')</script>"; 
echo "<a href='/projetoWebll/marketplace/index.php'>Volar a pagina principal</a>";
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


*/

?>