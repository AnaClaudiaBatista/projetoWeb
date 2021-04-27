<?php
include "verifica.php";
include_once "fachada.php";
include_once "teste_layout_header.php";

$produtoid = @$_GET["produtoid"];

$dao = $factory->getProdutoDao();
$produtoid = $dao->buscaPorId($produtoid);
?>

<body>
  <form action="altera_Produto.php" method="get">
    <div class="altera Produto">
      <h2>Altera Produto</h2>
      <div class="row">
        <div class="form-group">
          <label>Nome</label>
          <input type="text" class="form-control" name='nome' value='<?php echo $Produto->getNome();?>' placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
          <label>descricao</label>
          <input type="text" class="form-control" name='descricao' value='<?php echo $Produto->getdescricao();?>' placeholder="000.000.000-00">
        </div>
        <div class="form-group col-md-6">
          <label>foto</label>
          <input type="tel" class="form-control"  name='foto' value='<?php echo $Produto->getfoto();?>' placeholder="(XX)XXXX-XXXX">
        </div>

        <div>
            <div>
                <button type="submit" class="btn btn-success">Alterar</button>
                <a href='consultaProdutoes.php' class='btn btn-danger left-margin'>Cancela</a>
            </div>
        </div>

      <div class="form-group">
        
      </div>
      <input type='hidden' name='produtoid' value='<?php echo $fornecedor->getprodutoid();?>'/>
    </div>
  </form>
</body>

</html>

<?php

include_once "teste_layout_footer.php"; ?>