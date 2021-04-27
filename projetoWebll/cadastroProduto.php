<?php
include_once "teste_layout_header.php";
?>

  <form action="insere_Produto.php" method="get">
    <div class="cadastro">
      <h2>Cadastro de Produto</h2>
      <div class="row">

      <div class="form-group col-md-8">
      <img src="..." class="rounded float-left" width= "150px" height="150px">      
      </div>
      <div class="form-group col-md-6">      
      <button type="" class="btn btn-secondary">Carregar Foto</button>
      </div>

      <div class="form-group col-md-7">
          <label>Fornecedor</label>
          <select  class="form-control" name='fornecedor' >
            <option selected>Escolher...</option>
            <?php

            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Nome</label>
          <input type="text" class="form-control" name='nome' placeholder="Nome Completo">
        </div>
        <div class="form-group col-md-6">
          <label>descricao</label>
          <input type="text" class="form-control" name='descricao' placeholder="Descricao">
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

  include_once "teste_layout_footer.php"; ?>