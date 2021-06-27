<?php
include "../verifica.php";
include_once "../fachada.php";
include_once "../home/teste_layout_header.php";

$produtoid = @$_GET["produtoid"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorId($produtoid);
?>

<form action="alteraProduto.php" method="GET">
  <div class="cadastro">
    <h2>Cadastro de Produtos</h2>
    <div class="row">
      <div class="form-group col-md-7">
        <label>Fornecedor</label>
        <select class="form-control" name='fornecedor'>
          <option selected>Escolher...</option>
          <?php /*SELECT FORNECEDOR*/
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name='nome' value='<?php echo $produto->getNome(); ?>' placeholder="Nome">
      </div>
      <div class="form-group col-md-6">
        <label>Descrição</label>
        <input type="text" class="form-control" name='descricao' value='<?php echo $produto->getDescricao(); ?>'>
      </div>

      <div>
        <div>
          <button type="submit" class="btn btn-success">Alterar</button>
          <a href='consultaProduto.php' class='btn btn-danger left-margin'>Cancela</a>
        </div>
      </div>

    
      <input type='hidden' name='produtoid' value='<?php echo $produto->getprodutoid(); ?>' />
    </div>
    </div>
</form>


<?php

include_once "../home/teste_layout_footer.php";
?>