<?php
$page_title = "Demo : Autenticação Obrigatória";

// layout do cabeçalho
include_once "home/teste_layout_header.php";
?>

<form class="col-md-10 offset-md-11" action="executa_login.php" method="POST" role="form">
    <legend>Informe seu login e sua senha para entrar</legend>

    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Informe o Login">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>


