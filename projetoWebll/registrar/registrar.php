<?php
$page_title = "Demo : Autenticação Obrigatória";

// layout do cabeçalho
include_once "../navegacao/teste_layout_header.php";
?>


<div class="box-parent-login">
	<div class="well bg-white box-login">
		<h1 class="ls-login-logo">Cadastrar-se</h1>
		<form action="insereUsuario.php" method="get" role="form">
			<fieldset>

				<div class="form-group ls-login-user">
					<label for="userLogin">Usuário</label>
					<input class="form-control ls-login-bg-user input-lg" id="login" name='login' type="text" aria-label="Usuário" placeholder="Usuário">
				</div>
				<div class="form-group ls-login-user">
					<label for="userLogin">Nome</label>
					<input class="form-control ls-login-bg-user input-lg" id="nome" name='nome' type="text" aria-label="Nome" placeholder="Nome">
				</div>

				<div class="form-group ls-login-password">
					<label for="userPassword">Senha</label>
					<input class="form-control ls-login-bg-password input-lg" id="senha" name="senha" type="password" aria-label="Senha" placeholder="Senha">
				</div>
				<button type="submit" href="#" class="btn btn btn-success btn-lg btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Criar seu cadastro</button>

				<p class="txt-center ls-login-signup">Já possui login?
					<a href="../login/login.php">Entrar agora</a>
				</p>

			</fieldset>
		</form>
	</div>
</div>

<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>