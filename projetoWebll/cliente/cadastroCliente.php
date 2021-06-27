  <?php
  include_once "../home/teste_layout_header.php";

  if(isset($_GET['isPedido']))
  {
      $isPedido = 1;
  }
  else{
    $isPedido = 0;
  }
  ?>

  <form action="insereCliente.php" method="POST">
    <input type="hidden" name="isPedido" value="<?php echo $isPedido; ?>">
    <div class="cadastro">
      <h2>Informações Usuario</h2>
      
      <div class="row">
        <div class="form-group col-md-6">
          <label>Login</label>
          <input required type="text" class="form-control" name='login'/>
        </div>
        <div class="form-group col-md-6">
          <label>Senha</label>
          <input required type="password" class="form-control" name='senha' />
        </div>
      </div>
      <hr/>
      <h2>Cadastro de Clientes</h2>
      <div class="row">
        <div class="form-group">
          <label>Nome</label>
          <input required type="text" name='nome' class="form-control" placeholder="Nome" />
        </div>
        <div class="form-group col-md-6">
          <label>CPF</label>
          <input type="text" class="form-control" name='cpf' placeholder="000.000.000-00" />
        </div>
        <div class="form-group col-md-6">
          <label>Telefone</label>
          <input type="text" class="form-control" name='telefone' placeholder="(XX)XXXX-XXXX" />
        </div>
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" class="form-control" name='email' placeholder="email@email.com" />
        </div>
        <div class="form-group col-md-6">
          <label>Número do Cartao</label>
          <input type="text" class="form-control" name='cartaocredito' placeholder="Numero do Cartao" />
        </div>
        <div class="form-group">
          <label>Rua</label>
          <input type="text" class="form-control" name='rua' placeholder="Rua dos Bobos" />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label>Número</label>
          <input type="text" class="form-control" name='numero' placeholder="nº 0" />
        </div>
        <div class="form-group col-md-6">
          <label>Complemento</label>
          <input type="text" class="form-control" name='complemento' placeholder="Apartamento, hotel, casa, etc." />
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-5">
          <label>Cidade</label>
          <input type="text" class="form-control" name='cidade' placeholder="Caxias do Sul" />
        </div>
        <div class="form-group col-md-4">
          <label>Estado</label>
          <select id="inputEstado" class="form-control" name='estado' placeholder="Rio Grande do Sul" />
          <option selected>Escolher...</option>
          <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label>CEP</label>
          <input type="text" class="form-control" name='cep' placeholder="CEP" />
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </form>

  <?php
  include_once "../home/teste_layout_footer.php";
  ?>