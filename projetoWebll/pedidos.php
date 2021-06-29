<?php
// layout do cabeçalho

//include "verifica.php";

$page_title = "Listagem de Pedidos (REST API)";

include_once "layout_header.php";
?>

<script 	  type="text/javascript" src="libs/js/jquery-3.6.0.js">
</script>

<script 	  type="text/javascript" src="libs/js/bootstrap.min.js">
</script>

<script 	  type="text/javascript" src="libs/js/my_script.js">
</script>

<?php
echo "<section>";

// mostra os pedidos (não mostra, mas cria a div para mostrar)
echo "<div id='div_pedidos' class='pedido'>"; 
echo "</div>"; 

echo "<div id='div_pedido' class='pedido'></div>"; 
?>

<div class="text-center quadro">
  <a id="botaoNovaTurma" href="return false;" class="btn btn-default btn-primary btn-rounded mb-4" 
  data-toggle="modal" data-target="#turmaForm">Novo pedido</a>
</div>

</section>

<div class="modal fade" id="turmaForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Pedido/h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
	   
	    <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="codTurma" class="form-control validate">
          <label data-error="wrong" data-success="right" for="codTurma">Número</label>
        </div>

	    <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="nomeProfessor" class="form-control validate">
          <label data-error="wrong" data-success="right" for="nomeProfessor">Data do Pedido</label>
		</div>
		
	    <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="horario" class="form-control validate">
          <label data-error="wrong" data-success="right" for="horario">Data Entregue</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="horario" class="form-control validate">
          <label data-error="wrong" data-success="right" for="horario">Situação</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="hidden" id="id_da_turma" class="form-control validate">
        </div>

        </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" onClick="salvaPedido();">Salvar</button>
      </div>
    </div>
  </div>
</div>

<?php
// layout do rodapé
include_once "layout_footer.php";
?>

