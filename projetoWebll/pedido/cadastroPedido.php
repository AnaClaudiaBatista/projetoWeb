<?php
include_once "../navegacao/teste_layout_header.php";
?>

<form action="insereProduto.php" method="get" enctype="multipart/form-data">
  <div class="cadastro">
    <h2>Cadastro de Pedidos</h2>
    <div class="row">
      <div class="form-group col-md-8">
        <img src="..." id="imageProduto" class="rounded float-left" width="150px" height="150px">
      </div>
      <div class="form-group col-md-6">
        <input type="file" onchange="previewFile();" id="file" name="file" />
      </div>

      <div class="form-group col-md-7">
        <label>Pedido</label>
        <select class="form-control" name='fornecedorid'>
          <option selected>Escolher...</option>
          <?php
          include "../verifica.php";
          include_once "../fachada.php";
          $dao = $factory->getPedidoDao();
          $pedidos = $dao->buscaTodos($pedidoid, $situacao);

          if ($fornecedores) {
            foreach ($fornecedores as $fornecedor) {
              echo "<option value=\"" . $fornecedor->getFornecedorid() . "\">" . $fornecedor->getNome() . "</option>";
            }
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-8">
        <label>Id</label>
        <input type="text" class="form-control" name='nome' placeholder="Id do Pedido">
      </div>

      <div class="form-group col-md-8">
        <label>Data de Emissão</label>
        <textarea class="form-control" rows="3" name='descricao' placeholder="Data de Emissão"></textarea>
      </div>

      <div class="form-group col-md-8">
        <label>Data de Entrega</label>
        <textarea class="form-control" rows="3" name='descricao' placeholder="Data de Entrega"></textarea>
      </div>

      <div class="form-group col-md-8">
        <label>Situação</label>
        <textarea class="form-control" rows="3" name='descricao' placeholder="Situação"></textarea>
      </div>

      <div class="form-group col-md-8">
        <label>Id do cliente</label>
        <textarea class="form-control" rows="3" name='descricao' placeholder="Id do cliente"></textarea>
      </div>

      <div class="form-group col-md-8">
        <label>Nome do cliente</label>
        <textarea class="form-control" rows="3" name='descricao' placeholder="Nome do cliente"></textarea>
      </div>
    </div>

    <button type="submit" href="#" class="btn btn-primary">Cadastrar</button>
  </div>
</form>

<script src="../scripts/utilitarios.js"></script>

<?php

include_once "../navegacao/teste_layout_footer.php"; ?>