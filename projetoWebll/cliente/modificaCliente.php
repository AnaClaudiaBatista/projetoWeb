<?php
include "../verifica.php";
include_once "../fachada.php";
include_once "../navegacao/teste_layout_header.php";

$clienteid = $_GET["clienteid"];

$dao = $factory->getClienteDao();
$cliente = $dao->buscaPorId($clienteid);
?>

<body>
  <form action="alteraCliente.php" method="GET">
    <div class="cadastro">
      <h2>Cadastro de Clientes</h2>
      <div class="row">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" class="form-control" name='nome' value='<?php echo $cliente->getNome();?>' placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
          <label>CPF</label>
          <input type="text" class="form-control" name='cpf' value='<?php echo $cliente->getCpf(); ?>' placeholder="000.000.000-00">
        </div>
        <div class="form-group col-md-6">
          <label>Telefone</label>
          <input type="tel" class="form-control" name='telefone' value='<?php echo $cliente->getTelefone(); ?>' placeholder="(XX)XXXX-XXXX">
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" class="form-control" name='email' value='<?php echo $cliente->getEmail(); ?>' placeholder="email@email.com">
        </div>

        <div class="form-group col-md-6">
          <label>Número do Cartao</label>
          <input type="text" class="form-control" name='cartaocredito' value='<?php echo $cliente->getNum_cartaocredito(); ?>' placeholder="Numero do Cartao">
        </div>
      </div>


      <div class="form-group">
        <label>Rua</label>
        <input type="text" class="form-control" name='rua' placeholder="Rua dos Bobos">
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Número</label>
          <input type="text" class="form-control" name='numero' placeholder="nº 0">
        </div>
        <div class="form-group col-md-6">
          <label>Complemento</label>
          <input type="text" class="form-control" name='complemento' placeholder="Apartamento, hotel, casa, etc.">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-5">
          <label>Cidade</label>
          <input type="text" class="form-control" name='cidade' placeholder="Caxias do Sul">
        </div>
        <div class="form-group col-md-4">
          <label>Estado</label>
          <select id="inputEstado" class="form-control" name='estado' placeholder="Rio Grande do Sul">
            <option selected>Escolher...</option>
            <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>CEP</label>
          <input type="text" class="form-control" name='cep' placeholder="CEP">
        </div>
      </div>

      <div>
        <div>
          <button type="submit" class="btn btn-success">Alterar</button>
          <a href='consultaCliente.php' class='btn btn-danger left-margin'>Cancela</a>
        </div>
      </div>

      <div class="form-group">

      </div>
      <input type='hidden' name='clienteid' value='<?php echo $cliente->getclienteid(); ?>' />
    </div>
  </form>
</body>

</html>

<?php

include_once "../navegacao/teste_layout_footer.php"; ?>