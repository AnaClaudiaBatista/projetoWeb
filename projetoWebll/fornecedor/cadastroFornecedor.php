<?php
include_once "../home/teste_layout_header.php";
?>

  <form action="insereFornecedor.php" method="get">
    <div class="cadastro">
      <h2>Cadastro de Fornecedores</h2>
      <div class="row">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" class="form-control" name='nome' placeholder="Nome Completo">
        </div>
        <div class="form-group col-md-6">
          <label>CNPJ</label>
          <input type="text" class="form-control" name='cnpj' placeholder="00.000.000/0000-00">
        </div>
        <div class="form-group col-md-6">
          <label>Telefone</label>
          <input type="tel" class="form-control" name='telefone' placeholder="(XX)XXXX-XXXX">
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" class="form-control" name='email' placeholder="email@email.com">
        </div>
        <div class="form-group col-md-6">
          <label>Descrição</label>
          <input type="text" class="form-control" name='descricao' placeholder="descricao">
        </div>
      </div>

      <div class="form-group">
        <label>Rua</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos">
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label>Número</label>
          <input type="text" class="form-control" id="inputNumero" placeholder="nº">
        </div>
        <div class="form-group col-md-6">
          <label>Complemento</label>
          <input type="text" class="form-control" id="inputComplemento" placeholder="Complemento">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-5">
          <label>Cidade</label>
          <input type="text" class="form-control" id="inputCity" placeholder="Cidade">
        </div>
        <div class="form-group col-md-4">
          <label>Estado</label>
          <select id="inputEstado" class="form-control" placeholder="Estado">
            <option selected>Escolher...</option>
            <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>CEP</label>
          <input type="text" class="form-control" id="inputCEP" placeholder="CEP">
        </div>
      </div>
      <div class="form-group">
        <div class="form-check">


        </div>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
  </form>


<?php

  include_once "../home/teste_layout_footer.php"; ?>