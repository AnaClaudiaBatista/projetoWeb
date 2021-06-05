 <?php

include_once "../comum.php";

if (is_session_started() === FALSE) {
    session_start();
}

// Menu de navegação : mostra sempre

//echo "<li><a href='index.php'>Inicio</a></li>";

if (isset($_SESSION["nome_usuario"])) { ?>
  <!--  <nav>
        <ul class="menu">
            <li><a class="list-group-item list-group-item-action" href="inicio.php">Inicio</a></li>
            <li><a class="list-group-item list-group-item-action" href="../cliente/consultaCliente">Consultas CLientes</a></li>
            <li><a class="list-group-item list-group-item-action" href="../fornecedor/consultaFornecedor.php">Consultas Fornecedores</a></li>
            <li><a class="list-group-item list-group-item-action" href="../produto/consultaProduto.php">Consultas Produtos</a></li>
            <li><a class="list-group-item list-group-item-action" href="../cliente/cadastroCliente.php">Cadastro de Clientes</a></li>
            <li><a class="list-group-item list-group-item-action" href="../fornecedor/cadastroFornecedor.php">Cadastro de Fornecedores</a></li>
            <li><a class="list-group-item list-group-item-action" href="../produto/cadastroProduto.php">Cadastro de Produtos</a></li>
            <li><a class="list-group-item list-group-item-action" href="executa_logout.php">Sair</a></li>
        </ul>
    </nav>

   
-->
<?php
}
?>


<footer>
<p> 2021 </p>
</footer>

</body>

</html>