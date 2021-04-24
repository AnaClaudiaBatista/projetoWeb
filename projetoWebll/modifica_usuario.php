<?php
$page_title = "Demo : Alteração de Usuário";

include_once "fachada.php";
include "verifica.php";

$id = @$_GET["id"];

$dao = $factory->getUsuarioDao();
$usuario = $dao->buscaPorId($id);

// layout do cabeçalho
include_once "layout_header.php";
 ?>
 <section>
<form action="altera_usuario.php" method="get">
    <table class='table table-hover table-responsive table-bordered'>
         <tr>
            <td>Login</td>
            <td><input type='text' name='login' value='<?php echo $usuario->getLogin();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' value='<?php echo $usuario->getNome();?>'class='form-control' /></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type='password' name='senha' value='<?php echo $usuario->getSenha();?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <button type="submit" class="btn btn-primary">Alterar</button>
                <a href='usuarios.php' class='btn btn-primary left-margin'>Cancela</a>
            </td>
        </tr>
    </table>
    <input type='hidden' name='id' value='<?php echo $usuario->getId();?>'/>
</form>
</section>
<?php
// layout do rodapé
include_once "layout_footer.php";
?>


