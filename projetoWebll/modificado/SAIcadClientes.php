<?php
$page_title = "Demo : Cadastro de CLientes";
// layout do cabeçalho
//include_once "layout_header.php";
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastros</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }

       #barra {
       display: inline-block;
       margin: 10px 0;
       width: 100%;
  

}
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Cadastro de Clientes</h2>
      </div>

    <div class="row text-center>
     
      <div class="col-md-7 col-lg-8">        
        <form class="needs-validation" id="formulario" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control"  name="nome"   id="firstName" placeholder="" value="" required>
              
            </div>

            
            <div class="col-sm-6">
              <label for="lastName" class="form-label">CPF</label>
              <input type="text" class="form-control" name="cpf"  id="cpf" placeholder="" value="" required>
              
            </div>

            <div class="col-sm-6">
              <label for="fone" class="form-label">Telefone</label>
              <input type="text" class="form-control" name="fone"  id="fone" placeholder="" value="" required>
              
            </div>

                
            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Opcional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
             
            </div>
            <hr class="my-4">


            <div class="col-sm-6">
              <label for="lastName" class="form-label">Rua</label>
              <input type="text" class="form-control" name="rua" id="endereco" placeholder="" value="" required>
              
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Número</label>
              <input type="text" class="form-control" name="numero" id="numero" placeholder="" value="" required>
              
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Complemento</label>
              <input type="text" class="form-control" name="comp"  id="comp" placeholder="" value="" required>
              
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Cidade</label>
              <input type="text" class="form-control" name="cidade"  id="cidade" placeholder="" value="" required>
             
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Estado</label>
              <input type="text" class="form-control" name="estado" id="estado" placeholder="" value="" required>
              
            </div>

            <div class="col-md-6">
              <label for="zip" class="form-label">CEP</label>
              <input type="text" class="form-control" name="cep" id="zip" placeholder="" required>
              
            </div>
          </div>
         

            <button type="reset" id="limpar" class="btn btn-outline-primary btn-lg">Limpar</button>
            <button type="submit" class="btn btn-outline-primary btn-lg">Enviar </button>

          
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Ana Claudia Batista</p>
   
  </footer>
</div>

   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.js" ></script>  
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script type="text/javascript" src=https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" ></script>
 
    
    <script src="js/bootstrap.bundle.min.js"></script>

      <script src="js/form-validation.js"></script>
      <script src="js/form.js"></script>   

  </body>
</html>
<?php
// layout do rodapé
include_once "layout_footer.php";
?>
