<?php
    include_once "../fachada.php";
    $isPedido = 0;
    $isLogin = 0;

    if(isset($_GET['isPedido']))
    {
        $isPedido = 1;
    }

    if(isset($_GET['isLogin']))
    {
        $isLogin = 1;
    }
   
    include_once "../navegacao/teste_layout_header.php";
   
?>


<div class="box-parent-login">
	<div class="well bg-white box-login">
		<h1 class="ls-login-logo">Login</h1>
		<form action="../login/executa_login.php" method="POST" role="form">
			<fieldset>
 
				<div class="form-group ls-login-user">
                    <input type="hidden" name="isPedido" value="<?php echo $isPedido; ?>"/>
                    <input type="hidden" name="isLogin" value="<?php echo $isLogin; ?>"/>
					<label for="userLogin">Usuário</label>
					<input class="form-control ls-login-bg-user input-lg" id="login" name="login" type="text" aria-label="Usuário" placeholder="Usuário">
				</div>
 
				<div class="form-group ls-login-password">
					<label for="userPassword">Senha</label>
					<input class="form-control ls-login-bg-password input-lg" id="senha" name="senha" type="password" aria-label="Senha" placeholder="Senha">
				</div> 
				<button type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block">Entrar</button>
				<p class="txt-center ls-login-signup">Não possui cadastro?
					<a href="../registrar/registrarUsuario.php">Cadastre-se agora</a>
				</p>
                <a href="../cliente/cadastroCliente.php?isPedido=1" class="btn btn-warning" style="margin-top:10px;">Novo Usuário</a>

 
			</fieldset>
		</form>
	</div>
</div>

</html>