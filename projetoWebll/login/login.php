<?php
$page_title = "Demo : Autenticação Obrigatória";

// layout do cabeçalho
include_once "../home/teste_layout_header.php";
?>

<div class="box-parent-login">
	<div class="well bg-white box-login">
		<h1 class="ls-login-logo">Login</h1>
		<form action="executa_login.php" method="POST" role="form">
			<fieldset>
 
				<div class="form-group ls-login-user">
					<label for="userLogin">Usuário</label>
					<input class="form-control ls-login-bg-user input-lg" id="login" name="login" type="text" aria-label="Usuário" placeholder="Usuário">
				</div>
 
				<div class="form-group ls-login-password">
					<label for="userPassword">Senha</label>
					<input class="form-control ls-login-bg-password input-lg" id="senha" name="senha" type="password" aria-label="Senha" placeholder="Senha">
				</div> 
				<button type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block">Entrar</button>
				<p class="txt-center ls-login-signup">Não possui cadastro?
					<a href="../Registrar/registrarUsuario.php">Cadastre-se agora</a>
				</p>
 
			</fieldset>
		</form>
	</div>
</div>
