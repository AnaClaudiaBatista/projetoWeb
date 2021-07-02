<?php
include_once "../fachada.php";

// $clienteid     = @$_GET["clienteid"]; 
$isPedido                  = @$_POST["isPedido"];
$login                      = @$_POST["login"];
$senha                      = @$_POST["senha"];
$nome                      = @$_POST["nome"];
$email                     = @$_POST["email"];
$telefone                  = @$_POST["telefone"];
$cpf                       = @$_POST["cpf"];
$login                     = @$_POST["login"];
$tipo_usuario              = @$_POST["tipo_usuario"];
$num_cartaocredito         = @$_POST["num_cartaocredito"];
$cvv_cartaocredito         = @$_POST["cvv_cartaocredito"];
$titular_cartaocredito     = @$_POST["titular_cartaocredito"];
$vencimento_cartaocredito  = @$_POST["vencimento_cartaocredito"];


$daoCliente = $factory->getClienteDao();
$daoUsuario = $factory->getUsuarioDao();

$user = new Usuario(null, $login, $senha, $nome);

$usuarioid = $daoUsuario->insere($user);

if(isset($usuarioid) && $usuarioid > 0)
{
    $cliente = new Cliente(null,$nome,$email,$telefone,$cpf,  $tipo_usuario, $num_cartaocredito, $cvv_cartaocredito, $titular_cartaocredito, $vencimento_cartaocredito, $usuarioid );

    if ($daoCliente->insere($cliente)){
        echo '<div class="alert alert-sucess">
        <strong>Sucesso!</strong> avaliação cadastrada.
        </div>';

        if($isPedido == 1)
        {
            session_start();
            $_SESSION['usuario_logado'] = $daoUsuario->buscaPorId($usuarioid);

            header("Location: ../marketplace/criarPedido.php");
        }
        else{
            include_once "consultaCLiente.php";
        }
        
        // header("Location: consultaCLiente.php");
    }else{
        echo '<div class="alert alert-danger">
                <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a avaliação.
                </div>';
    }
}
else{
    echo '<div class="alert alert-danger">
                <strong>Erro ao cadastrar Usuário!</strong> Não foi possível cadastrar a avaliação.
                </div>';
}



exit;
