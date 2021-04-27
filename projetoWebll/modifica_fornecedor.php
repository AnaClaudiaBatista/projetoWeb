<?php
include "verifica.php";
include_once "fachada.php";
include_once "teste_layout_header.php";

$fornecedorid = @$_GET["fornecedorid"];

$dao = $factory->getFornecedorDao();
$fornecedor = $dao->buscaPorId($fornecedorid);
?>

<body>
  <form action="altera_fornecedor.php" method="GET">
    <div class="cadastro">
      <h2>Cadastro de Fornecedores</h2>
      <div class="row">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" class="form-control" name='nome' value='<?php echo $fornecedor->getNome();?>' placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
          <label>CNPJ</label>
          <input type="text" class="form-control" name='cnpj' value='<?php echo $fornecedor->getCnpj();?>' placeholder="00.000.000/0000-00">
        </div>
        <div class="form-group col-md-6">
          <label>Telefone</label>
          <input type="text" class="form-control"  name='telefone' value='<?php echo $fornecedor->getTelefone();?>' placeholder="(XX)XXXX-XXXX">
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" class="form-control" name='email' value='<?php echo $fornecedor->getEmail();?>' placeholder="email@email.com">
        </div>

        <div class="form-group col-md-6">
          <label>Descrição</label>
          <input type="text" class="form-control" name='descricao' value='<?php echo $fornecedor->getDescricao();?>' placeholder="Descrição">
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
                <a href='consultaFornecedores.php' class='btn btn-danger left-margin'>Cancelar</a>
            </div>
        </div>

      <div class="form-group">
        
      </div>
      <input type='hidden' name='fornecedorid' value='<?php echo $fornecedor->getFornecedorid();?>'/>
    </div>
  </form>
</body>

</html>

<?php

include_once "teste_layout_footer.php"; ?>