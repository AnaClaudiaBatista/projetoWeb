<?php
include_once "../home/teste_layout_header.php";
?>

<form action="insereProduto.php" method="POST" enctype="multipart/form-data">
  <div class="cadastro">
    <h2>Cadastro de Produtos</h2>
    <div class="row">
      <div class="form-group col-md-8">
        <img src="..." id="imageProduto" class="rounded float-left" width="150px" height="150px">
      </div>
      <div class="form-group col-md-6">
        <input type="file" onchange="previewFile();"  id="file" name="file"/>
      </div>

      <div class="form-group col-md-7">
        <label>Fornecedor</label>
        <select class="form-control" name='fornecedor'>
          <option selected>Escolher...</option>
          <?php

          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name='nome' placeholder="Nome da Empresa">
      </div>
      <div class="form-group col-md-6">
        <label>descricao</label>
        <input type="text" class="form-control" name='descricao' placeholder="Descricao">
      </div>
    </div>

    <button type="submit" href="#" class="btn btn-primary">Cadastrar</button>
  </div>
</form>

<script src="../scripts/utilitarios.js"></script>

<?php

include_once "../home/teste_layout_footer.php"; ?>